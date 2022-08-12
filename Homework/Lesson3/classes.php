<?php
const DEFAULT_USER_AGE = 76;
const DEFAULT_USER_NAME = 'John';
const MINIMAL_USER_AGE = 18;
const MAXIMAL_USER_AGE = 80;

class User
{
    //Избавился от антипаттерна Privatization
    protected $name = DEFAULT_USER_NAME;
    protected $age = DEFAULT_USER_AGE;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        //Антипаттерн Magic Numbers устрнанён
        if ($age >= MINIMAL_USER_AGE) {
            $this->age = $age;
        }
    }

    //Антипаттерн Cryptic Code (по названию метода невозможно до конца понять его назначение)
    public function print (){
        echo "Возраст студента по имени " . $this->getName() . " - " .  $this->getAge() . ".\n";
    }
}

class Student extends User
{
    private $course;

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function setName($name)
    {
        $this->name = strtoupper($name);
    }
    public function setAge($age)
    {
        //Антипаттерн Magic Numbers устрнанён
        if ($age >= MINIMAL_USER_AGE && $age<=MAXIMAL_USER_AGE) {
            $this->age = $age;
        }
    }
}
