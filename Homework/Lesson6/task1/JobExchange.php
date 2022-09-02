<?php

class JobExchange implements IObservable
{
    private array $observers = [];
    private array $vacancies = [];

    /**
     * @param  IObserver[]  $observers
     */
    public function __construct(array $observers, array $vacancies)
    {
        $this->observers = $observers;
        $this->vacancies = $vacancies;
    }


    public function attach(IObserver $observer)
    {
        $this->notify("добавлен новый соискатель - {$observer->name}.");
        $this->observers[] = $observer;
    }

    public function detach(int $id)
    {
        $offset = $this->findElemId($id, "observers");

        $observerName = $this->observers[$offset]->name;
        echo "Подписчик сервиса удалён\n";
        array_splice($this->observers, $offset, 1);
        $this->notify("соискатель {$observerName} удалён из списка подписчиков сервиса.");
        $this->displayInfo("observers");

    }

    public function notify(string $message)
    {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
        echo PHP_EOL;
    }

    /**
     * @param $name Название
     * @param $salary Зарплата
     * @return void
     */
    public function addJob(string $name, float $salary)
    {
        $this->vacancies[] = (object) ["name" => $name, "salary" => $salary];
        echo "Появилась новая вакансия {$name}\n";
        $this->notify("появилась новая вакансия - {$name}.");
        echo PHP_EOL;
    }

    public function removeJob($id)
    {
        $offset = $this->findElemId($id, "vacancies");

        $vacancyName = $this->vacancies[$offset]->name;
        echo "Вакансия заполнена\n";
        array_splice($this->vacancies, $offset, 1);
        $this->notify("вакансия {$vacancyName} заполнена.");
        $this->displayInfo("vacancies");
    }

    public function displayInfo($key)
    {
        switch ($key) {
            case "observers":
                if ($this->$key) {
                    echo "Список подписчиков:\n";
                    $this->printList($key);
                } else {
                    echo "Подписчиков нет.\n";
                }
                break;
            case "vacancies":
                if ($this->$key) {
                    echo "Список доступных вакансий:\n";
                    $this->printList($key);
                } else {
                    echo "Вакансий нет.\n";
                }
                break;
        }
    }

    private function printList($key)
    {
        foreach ($this->$key as $value) {
//            echo print_r($this->$key);
            echo $value->name.' ';
        }
        echo PHP_EOL;
    }

    private function findElemId($id, $key)
    {
        $offset = null;
        for ($i = 0; $i <= count($this->{$key}); $i++) {
            if ($this->{$key}[$i]->id === $id) {
                $offset = $i;
                break;
            }
        }
        return $offset;
    }
}