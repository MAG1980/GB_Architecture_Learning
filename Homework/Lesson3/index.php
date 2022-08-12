<?php
require_once "classes.php";

//Устранил проблему нарушения принципа инверсии зависимостей
$student = new Student(new UserRepository);

print_r($student->repository);
$student->repository->printAge($student->getName(), $student->getAge());

$student->setAge(24);    // поменяем возраст студента на другой, но корректный возраст
$student->repository->printAge($student->getName(), $student->getAge());

$student->setAge(89);    // укажем некорректный возраст
$student->repository->printAge($student->getName(), $student->getAge());

$student->setName("Vladimir");

$student->repository->printAge($student->getName(), $student->getAge());