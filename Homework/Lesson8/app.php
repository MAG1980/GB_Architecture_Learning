<?php
// Создаем новый объект DirectoryIterator
//$dir = new DirectoryIterator("/my/directory/path");
//$dir = new DirectoryIterator(" /home/alexey/PhpstormProjects/GB_Architecture_Learning/Homework/Lesson8/");
$dir = new DirectoryIterator(__DIR__);
// Цикл по содержанию директории
/*foreach ($dir as $item) {
    echo $item . "<br>";
}*/
$n = 100;
$array[] = [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 1; $j < $n; $j *= 2) {
        $array[$i][$j] = true;

    }
}
