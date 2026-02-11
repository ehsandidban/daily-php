<?php

$names = ['one', 'two', 'three', 'four', 'five'];
$numbers = [1, 2, 3, 4, 5];

function shfl(&$string)
{
    $length = sizeof($string);
    $result = [];
    for ($i = 0; $i < $length; $i++) {
        $j = rand(0, $length - 1);
        while (in_array($string[$j], $result)) {
            $j = rand(0, $length - 1);
        }
        $result[$i] = $string[$j];
    }
    $string = $result;
}

shfl($numbers);
print_r($numbers);