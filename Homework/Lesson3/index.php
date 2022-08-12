<?php
require_once "classes.php";

$student = new Student;

$student->printAge();

$student->setAge(24);    // поменяем возраст студента на другой, но корректный возраст
$student->printAge();

$student->setAge(89);    // укажем некорректный возраст
$student->printAge();

$student->setName("Vladimir");
$student->printAge();
