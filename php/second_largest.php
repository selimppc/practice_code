<?php

function secondLargest(array $arr) {
    if(count(array_unique($arr)) < 2) return null;

    $first = $second = PHP_INT_MIN;

    foreach($arr as $num) {
        if($num > $first) {
            $second = $first;
            $first = $num;
        }elseif($num > $second && $num != $first) {
            $second = $num;
        }
    }

    return $second;

}

print (secondLargest([10, 5, 20, 8]) ).  "\n";