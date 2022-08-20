<?php

class EmailNotification extends Notification
{

    /**
     * @return void
     */
    public function notify(): void
    {
        $this->data->notify();
        //Отправка email-сообщения
        echo "Отправлено email-сообщение об успешном оформлении заказа.\n";
    }
}