<?php

function findLeaders(array $arr){
    $n = count($arr);
    if($n == 0) return [];

    $leaders = [];
    $max_from_right = $arr[$n-1];
    $leaders[] = $max_from_right;

    for($i = $n-2; $i >=0; $i--){
        if($arr[$i] >= $max_from_right){
            $max_from_right = $arr[$i];
            $leaders[] = $arr[$i];
        }
    }

    return array_reverse($leaders);

}

print_r(findLeaders([16, 17, 4, 3, 5, 2])); // output [17, 5, 2]

// Metric	Value
// Time Complexity	O(n) (one pass)
// Space Complexity	O(k) (number of leaders)