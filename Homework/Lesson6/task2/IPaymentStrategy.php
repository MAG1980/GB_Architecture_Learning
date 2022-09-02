<?php

interface IPaymentStrategy
{
public function payOrder(float $totalPrice, string $phoneNumber);
}