<?php

class SmsNotification extends Notification
{
    public function notify(): void
    {
        $this->data->notify();
        //Отправка SMS-сообщения
        echo "Отправлено SMS-сообщение об успешном оформлении заказа.\n";
    }
}