<?php

class JobExchange implements IObservable
{
    private IObserver $observers;

    public function attach(IObserver $observer)
    {
        $this->observers[]=$observer;
    }

    public function detach(IObserver $observer)
    {
        //TODO Реализовать удаление наблюдателя по параметру
    }

    public function notify(string $message)
    {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }

    public function addJob(){
        echo "Появилась новая вакансия\n";
        $this->notify("Появилась новая вакансия\n");
    }
    public function removeJob(){
        echo "Вакансия заполнена\n";
        $this->notify("Вакансия заполнена\n");
    }
}