<?php
include "ICircle.php";
include "ISquare.php";
include "CircleAreaLib.php";
include "SquareAreaLib.php";
include "CircleAreaLibAdapter.php";
include "SquareAreaLibAdapter.php";

$circumference1 = M_PI * 10;
$sideSquare1 = 10;
$circumference2 = M_PI * 20;
$sideSquare2 = 20;

$circle = new CircleAreaLibAdapter(new CircleAreaLib);
$circleArea = $circle->circleArea($circumference1);
echo "Площадь круга с длиной окружности {$circumference1} см приблизительно равняется {$circleArea} см2\n";

$square = new SquareAreaLibAdapter(new SquareAreaLib);
$squareArea = $square->squareArea($sideSquare1);
echo "Площадь квадрата с длиной стороны {$sideSquare1} см приблизительно равняется {$squareArea} см2\n";


$circle = new CircleAreaLibAdapter(new CircleAreaLib);
$circleArea = $circle->circleArea($circumference2);
echo "Площадь круга с длиной окружности {$circumference2} см приблизительно равняется {$circleArea} см2\n";

$square = new SquareAreaLibAdapter(new SquareAreaLib);
$squareArea = $square->squareArea($sideSquare2);
echo "Площадь квадрата с длиной стороны {$sideSquare2} см приблизительно равняется {$squareArea} см2\n";