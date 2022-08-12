<?php
require_once "classes.php";

$student = new Student;

echo "Возраст студента по имени " . $student->getName() . " - " .  $student->getAge() . ".\n"; // выведет 24 - возраст поменялся

$student->setAge(24);    // поменяем возраст студента на другой, но корректный возраст
echo "Возраст студента по имени " . $student->getName() . " - " .  $student->getAge() . ".\n"; // выведет 24 - возраст поменялся

$student->setAge(3);    // укажем некорректный возраст
echo "Возраст студента по имени " . $student->getName() . " - " .  $student->getAge() . ".\n";

$student->setName("Vladimir");
echo "Возраст студента по имени " . $student->getName() . " - " .  $student->getAge() . ".\n";
