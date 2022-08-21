<?php

interface IObservable
{
    public function attach(IObserver $observe);
    public function detach(IObserver $observer);
    public function notify(string $message);
}