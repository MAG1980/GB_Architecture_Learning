<?php

class QiwiPayment implements IPaymentStrategy
{
    public function payOrder(float $totalPrice, string $phoneNumber){
        echo "Произведена оплата заказа стоимостью {$totalPrice} рублей с помощью платёжной системы Qiwi. Номер телефона заказчика - {$phoneNumber}." . PHP_EOL;
    }
}