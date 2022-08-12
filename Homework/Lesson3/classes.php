<?php
class User
{
    private $name = "John";
    private $age = 76;

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
        if ($age >= 18) {
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
}
