<?php
$array = [];
for ($i = 0; $i < 10; $i++) {
    $array[] = rand();
}


function findElem($arr, $element)
{
    $start = 0;
    $end = count($arr) - 1;

    while ($start <= $end) {
        $middle = floor(($start + $end) / 2);
        /*    echo "Start: ".$start.PHP_EOL;
            echo "Middle: ".$middle.PHP_EOL;
            echo "End: ".$end.PHP_EOL.PHP_EOL;*/
        if ($element === $arr[$middle]) {
            return $middle;
        }
        if ($element < $arr[$middle]) {
            $end = $middle - 1;
        }
        if ($element > $arr[$middle]) {
            $start = $middle + 1;
        }
    }
    return null;
}

function findElementDuplicates($arr, $element): ?array
{
    $index = findElem($arr, $element);
    if (is_null($index)) {
        return null;
    } else {
        $leftIndex = $rightIndex = $index;
//        echo "Index of element = ".$index.PHP_EOL;
        while ($arr[$leftIndex - 1] === $element) {
            $leftIndex = $index - 1;
//            echo "LeftIndex= ".$leftIndex.PHP_EOL;
        }
        while ($arr[$rightIndex + 1] === $element) {
            $rightIndex = $index + 1;
//            echo "RightIndex= ".$rightIndex.PHP_EOL;
        }
    }

    return [$leftIndex, $rightIndex - $leftIndex + 1];
}

function cutDuplicates(&$arr, $element)
{
    [$offset, $length] = findElementDuplicates($arr, $element);
/*    echo $offset.PHP_EOL;
    echo $length.PHP_EOL;*/
    array_splice($arr, $offset, $length);
}

//Создаю копию исходного массива
$arr = $array;
$arr[0] = $arr[5] = $arr[9] = 3;
echo "Исходный массив с добавленными в произвольном порядке дублирующимися элементами (3): ".PHP_EOL;
print_r($arr);

sort($arr, SORT_NUMERIC);
echo "Исходный массив с добавленными в произвольном порядке дублирующимися элементами (3) после сортировки: ".PHP_EOL;
print_r($arr);

//$el = findElem($arr, 3);
//echo $el;

//findElementDuplicates($arr, 3);

cutDuplicates($arr, 3);
echo "Тот же массив после удаления искомого элемента и всех его дубликатов: ".PHP_EOL;
print_r($arr);