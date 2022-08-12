<?php
require_once "classes.php";

$student = new Student;

$student->print();

$student->setAge(24);    // поменяем возраст студента на другой, но корректный возраст
$student->print();

$student->setAge(89);    // укажем некорректный возраст
$student->print();

$student->setName("Vladimir");
$student->print();
