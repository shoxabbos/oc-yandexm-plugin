<?php namespace Webinsane\Yandexmbutton\Components;

use Cms\Classes\ComponentBase;
use Webinsane\Yandexmbutton\Models\Settings;

class PaymentForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'YandexPaymentForm',
            'description' => 'Component for make payment'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $this->page['wallet'] = Settings::get('wallet');
        $this->page['onoff'] = Settings::get('formenable');
    }
}
