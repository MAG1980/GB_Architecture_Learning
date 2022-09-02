<?php

//Проверяет число на натуральность
function isPrime($number): bool
{
    //Вычисляем максимальный делитель числа
    $maxDivider = ceil(sqrt($number));
//        echo "MexDivider = " . $maxDivider . PHP_EOL;
    if ($number === 2) {
        return true;
    }
    for ($i = 2; $i <= $maxDivider; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

//Возвращает массив натуральных чисел заданной длины
function primeNumbers($number)
{
    $primeNumbers = [];
    $i = 2;
    while (count($primeNumbers) <= $number - 1) {
        if (isPrime($i)) {
            $primeNumbers[] = $i;
        }
        $i += 1;
    }
    return $primeNumbers;
}

print_r(primeNumbers(10001));

