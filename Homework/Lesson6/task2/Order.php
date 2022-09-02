<?php

class Order
{
    protected IPaymentStrategy $paymentStrategy;

    /**
     * @param  IPaymentStrategy  $paymentStrategy
     */
    public function __construct(IPaymentStrategy $paymentStrategy)
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function pay(float $totalPrice, string $phoneNumber)
    {
        $this->paymentStrategy->payOrder($totalPrice, $phoneNumber);
    }
}