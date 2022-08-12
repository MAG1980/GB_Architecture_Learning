<?php
require_once "classes.php";

$student = new Student;

print_r($student->repository);
$student->repository->printAge($student->getName(), $student->getAge());

$student->setAge(24);    // поменяем возраст студента на другой, но корректный возраст
$student->repository->printAge($student->getName(), $student->getAge());

$student->setAge(89);    // укажем некорректный возраст
$student->repository->printAge($student->getName(), $student->getAge());

$student->setName("Vladimir");

$student->repository->printAge($student->getName(), $student->getAge());