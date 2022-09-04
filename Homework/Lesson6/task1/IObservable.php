<?php

interface IObservable
{
    public function attach(IObserver $observe);
    public function detach(int $id);
    public function notify(string $message);
}