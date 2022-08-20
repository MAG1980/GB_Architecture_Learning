<?php

class Order implements INotification
{
protected int $id;

    /**
     * @param  int  $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
//    Бизнес-логика

    public function notify(): void
    {
       echo "Заказ №{$this->id} оформлен! \n";
    }
}