<?php
$arr = [];
for ($i = 0; $i < 1000000; $i++) {
    $arr[] = rand();
}
//print_r($arr);
$arr1 = $arr;
$arr2 = $arr;
$arr3 = $arr;
$arr4 = $arr;

function bubbleSort($arr)
{
    for ($i = 1; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr) - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

function shakerSort($arr)
{
    $n = count($arr);
    $left = 0;
    $right = $n - 1;
    do {
        //Проход по массиву вправо
        for ($i = $left; $i < $right; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                list($arr[$i], $arr[$i + 1]) = array($arr[$i + 1], $arr[$i]);
            };
        }

//На вершину помещён максимальный элемент массива, поэтому верхнюю границу сортировки пора понизить
        $right -= 1;
        //Проход по массиву влево
        for ($i = $right; $i > $left; $i--) {
            if ($arr[$i] < $arr[$i - 1]) {
                list($arr[$i], $arr[$i - 1]) = array($arr[$i - 1], $arr[$i]);
            }
        }

//Наименьший элемент массива помещён в его начало, поэтому индекс нижней границы сортировки нужно повысить
        $left += 1;

    } while ($left <= $right);

    return $arr;
}

function quickSort(&$arr, $low, $high)
{
    $i = $low;
    $j = $high;
    //Значение центрального элемента выборки
    $middle = $arr[($low + $high) / 2];
    do {
        while ($arr[$i] < $middle) {
            ++$i;
        };
        while ($arr[$j] > $middle) {
            --$j;
        };
        if ($i <= $j) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
            $i++;
            $j--;
        }
    } while ($i < $j);

    //Рекурсивно вызываем сортировку для правой части массива
    if ($i < $high) {
        quickSort($arr, $i, $high);
    }

    //Рекурсивно вызываем сортировку для левой части массива
    if ($j > $low) {
        quickSort($arr, $low, $j);
    }
}

function pyramidSort($arr)
{
    //Создаём пустую минимальную кучу (на вершине - минимальное значение)
    $tree = new SPLMinHeap();

    //Наполняем кучу элементами массива
    foreach ($arr as $elem) {
        $tree->insert($elem);
    }

    //Очищаем массив (это можно сделать, т.к. все его элементы уже помещены в кучу)
    $arr = [];

    //До тех пор, пока куча не опустеет, извлекаем элементы из её вершины и помещаем их в массив.
    while ($tree->valid()) {
        $arr[] = $tree->top();
        $tree->next();
    }
    return $arr;
}

function scriptRunningTime($script)
{
    $start = microtime(true);
    echo $script;
    return $start - microtime(true);
}

//echo "arr1".PHP_EOL;
//print_r(bubbleSort($arr1));
//echo "arr2".PHP_EOL;
//print_r(shakerSort($arr2));
//echo "arr3".PHP_EOL;
//quickSort($arr3, 0, count($arr3) - 1);
//print_r($arr3);
//echo "arr4".PHP_EOL;
//print_r(pyramidSort($arr4));
//$bubbleSort = bubbleSort($arr1);
//$shakerSort = shakerSort($arr2);
//$quickSort = quickSort($arr3, 0, count($arr3) - 1);
//$pyramidSort = pyramidSort($arr4);
//echo "Сортировка пузырьком - ".  scriptRunningTime($bubbleSort) . PHP_EOL;
//echo "Шейкерная сортировка - ".  scriptRunningTime($shakerSort) . PHP_EOL;
//echo "Быстрая сортировка - ".  scriptRunningTime($quickSort) . PHP_EOL;
//echo "Пирамидальная сортировка - ".  scriptRunningTime($pyramidSort) . PHP_EOL;

$start = microtime(true);
bubbleSort($arr1);
$end = microtime(true);
$scriptRunningTime = $end - $start;
echo "Сортировка пузырьком - ".$scriptRunningTime.PHP_EOL;

$start = microtime(true);
shakerSort($arr2);
$end = microtime(true);
$scriptRunningTime = $end - $start;
echo "Шейкерная сортировка - ".$scriptRunningTime.PHP_EOL;

$start = microtime(true);
quickSort($arr3, 0, count($arr3) - 1);
$end = microtime(true);
$scriptRunningTime = $end - $start;
echo "Быстрая сортировка - ".$scriptRunningTime.PHP_EOL;

$start = microtime(true);
scriptRunningTime($pyramidSort);
$end = microtime(true);
$scriptRunningTime = $end - $start;
echo "Пирамидальная сортировка - ".$scriptRunningTime.PHP_EOL;