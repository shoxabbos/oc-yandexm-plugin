<?php
use Input as Input;
use Webinsane\Yandexmbutton\Models\Settings;
use Webinsane\Yandexmbutton\Models\Transaction;
use RainLab\User\Models\User;

Route::post('yandexPayGate', function (){
//    Mail::rawTo('akpomah@gmail.com', json_encode(input()));
    $dataFromYandex = Input::all();
    $dataForHashing= [$dataFromYandex['notification_type'],
                     $dataFromYandex['operation_id'],
                     $dataFromYandex['amount'],
                     $dataFromYandex['currency'],
                     $dataFromYandex['datetime'],
                     $dataFromYandex['sender'],
                     $dataFromYandex['codepro'],
                     Settings::getApiKey(),
                     $dataFromYandex['label']
    ];
    $sha1_hash = calc_hash($dataForHashing);

    if($sha1_hash == $dataFromYandex['sha1_hash']) {
        $userId = $dataFromYandex['label'] ?: 1;
        $user = User::find($userId);
        if ($user != null) {
            $amount = isset($dataFromYandex['withdraw_amount']) ? $dataFromYandex['withdraw_amount'] : $dataFromYandex['amount'];
            $user->balance += Settings::get('rate_rub', 150) * $amount;
            $user->save();
            $transaction = new Transaction();
            $transaction->trans_id = $dataFromYandex['operation_id'];
            $transaction->owner_id = $userId;
            $transaction->amount = $amount;
            $transaction->save();
            return Response::make('success', 200)
                ->header("Content-Type", "text/plain");
        }
    }
    else{
        return Response::make('fail',404)
            ->header("Content-Type", "text/plain");
    }
});

function calc_hash(Array $forHashing){
    return sha1(implode('&', $forHashing));
}