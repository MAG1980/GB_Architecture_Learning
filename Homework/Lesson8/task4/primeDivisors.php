<?php

/*
 * Простые делители числа 13195 — 5, 7, 13 и 29. Каков самый большой делитель числа
      600851475143, являющийся простым числом?

Ответ: 6857.
*/

function isPrime($x)
{
    for ($i = 2; $i < $x; $i++) {
        if ($x % $i === 0) {
            return false;
        }
    }
    return true;
}

function maxPrimeDivisor($n)
{
    //Если $n является натуральным числом, то оно является решением задачи
    if (isPrime($n)) {
        return $n;
    }

    //Находим максимальное число, которое может быть простым делителем числа $n (не считая самого $n)
    $j = ceil(sqrt($n));

    while ($j > 1) {
        if ($n % $j === 0 && isPrime($j)) {
            /*Находим единственное число, которое больше квадратного корня из $n и теоретически может являться его натуральным делителем*/
            $moreThanSquare = $n / $j;
            if (isPrime($moreThanSquare)) {
                return $moreThanSquare;
            } else {
                return $j;
            }
        }
        $j--;
    }
    return null;
}

echo maxPrimeDivisor(600851475143);