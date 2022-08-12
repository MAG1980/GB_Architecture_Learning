<?php
const DEFAULT_USER_AGE = 76;
const DEFAULT_USER_NAME = 'John';
const MINIMAL_USER_AGE = 18;

class User
{
    //Антипаттерн Privatization
    private $name = DEFAULT_USER_NAME;
    private $age = DEFAULT_USER_AGE;

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
        //Антипаттерн Magic Numbers
        if ($age >= MINIMAL_USER_AGE) {
            $this->age = $age;
        }
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
        $this->name = $name;
    }
}
