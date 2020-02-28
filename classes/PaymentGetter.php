<?php
/**
 * Created by PhpStorm.
 * User: hetrock
 * Date: 30.08.17
 * Time: 23:49
 */

namespace Webinsane\Yandexmbutton\Classes;


use WebInsane\Yandexmoney\Models\Order;
use WebInsane\Yandexmoney\Models\Promocode;
use Carbon\Carbon;
use Storage;

class PaymentGetter extends PaymentMiddleware
{
    const SECRET = '' ;
    public function calc_hash(Array $forHashing){
        return sha1(implode('&', $forHashing));
    }
    public function payOrder(Order $order,$amount,$datetime)
    {
        $amount = floatval($amount);
        $ordersAmount = $order->order->getPrice();

        if($ordersAmount == $amount) {
            $order->activate();
        }
    }
}
