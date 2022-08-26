<?php

abstract class Notification implements INotification
{
    protected INotification $data ;

    /**
     * @param  INotification  $data
     */
    public function __construct(INotification $data)
    {
        $this->data = $data;
    }
}