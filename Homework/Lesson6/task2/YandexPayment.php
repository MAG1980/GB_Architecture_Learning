<?php

class YandexPayment implements IPaymentStrategy
{
    public function payOrder(float $totalPrice, string $phoneNumber){
        echo "Произведена оплата заказа стоимостью {$totalPrice} рублей с помощью платёжной системы Yandex. Номер телефона заказчика - {$phoneNumber}." . PHP_EOL;
    }
}