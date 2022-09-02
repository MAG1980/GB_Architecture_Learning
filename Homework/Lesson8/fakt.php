<?php

function fakt ($n){
    if ($n===1 || $n===0) return 1;
    return fakt ($n-1) *$n;
}

echo fakt (0) . PHP_EOL;
echo fakt (1) . PHP_EOL;
echo fakt (2) . PHP_EOL;
echo fakt (3) . PHP_EOL;
echo fakt(4) . PHP_EOL;
echo fakt(5) . PHP_EOL;