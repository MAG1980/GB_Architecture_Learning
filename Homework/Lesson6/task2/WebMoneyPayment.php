<?php

class WebMoneyPayment implements IPaymentStrategy
{    public function payOrder(float $totalPrice, string $phoneNumber){
    echo "Произведена оплата заказа стоимостью {$totalPrice} рублей с помощью платёжной системы WebMoney. Номер телефона заказчика - {$phoneNumber}." . PHP_EOL;
}

}