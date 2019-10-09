<?php

$array = [9,3,5,6,7,8,2,1,0];

/**
 * @param array $array
 * @param int $position
 * @return void
 */
function array_swap(array &$array, int $position = 0): void
{
    if (is_array($array) && $position != 0) {
        [$array[0], $array[$position]] = [$array[$position], $array[0]];
    }
}

$lastIdx = count($array) - 1;
$idx = $lastIdx;

while ($idx > 0) {
    $compareOne = $array[$idx] < $array[0] ;
    $compareTwo = $array[$idx] < $array[$idx - 1];
    if ($compareOne || $compareTwo) {
        array_swap($array, $compareOne ? $idx : $idx - 1);
        $idx = $lastIdx;
    } else {
        $idx--;
    }
}

echo print_r($array);
