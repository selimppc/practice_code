<?php

$nested = [1, [2, 3], [4, [5, 6]], 7];

function flattenArray($array) {
    $flat = [];
    // foreach ($array as $value) {
    //     if (is_array($value)) {
    //         $flat = array_merge($flat, flattenArray($value));
    //     } else {
    //         $flat[] = $value;
    //     }
    // }
    // return $flat;

    array_walk_recursive($array, function($v) use (&$flat) {
        $flat[] = $v;
    });

    return $flat;
}

print_r(flattenArray($nested)) . "\n"; // Output: 1,2,3,4,5,6,7