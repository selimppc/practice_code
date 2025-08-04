<?php


// Function to calculate square root with precision
function squareRootWithPrecision($N, $D){
    if ($N <0 ) {
        throw new InvalidArgumenrtException("N must be a non-negatice interger.");
    }

    if ($N === 0 ) {
        return number_format(0, $D, '.', '');
    }

    $low = 0;
    $high = max(1.0, (float)$N);

    $precision = 1 / pow(10, $D+1);

    while ( $high - $low > $precision) {
        $mid = ($low + $high) / 2;
        if ($mid * $mid < $N ) {
            $low = $mid;
        }else{
            $high = $mid;
        }
    }

    $approx = $high;

    $factor = pow(10, $D);
    $truncated = floor($approx * $factor) / $factor;

    return number_format($truncated, $D, '.', '');

}

$tests = [
    [10, 3],
    [2, 5],
    [1, 0],
    [0, 4],
];

foreach ($tests as list($n, $d)) {
    echo "√{$n} to {$d} decimals = " . squareRootWithPrecision($n, $d) . "\n";
}


// Example usage of max function
// This will output the maximum value among the provided numbers.
echo max(2, 3, 1, 6, 7);


// Power Calculation Problem statement
// You are given two integers, 'A' and 'B'. Your task is to compute

echo "\n";

echo "pow== " . pow(2, 3); // Outputs 8

// problem statement
//longestUniqueSubstringLength

echo "\n";
echo strlen("HELLO WORLD");

function longestUniqueSubstringLength($s) {
    $n = strlen($s);
    $charIndex = [];
    $maxLength = 0;
    $start = 0;

    for ($end = 0; $end < $n; $end++) {
        $char = $s[$end];
        if(isset($charIndex[$char]) && $charIndex[$char] >= $start) {
            $start = $charIndex[$char] + 1;
        }

        $charIndex[$char] = $end;

        $length = $end - $start + 1;
        $maxLength = max($maxLength, $length);
    }

    return $maxLength;
}

echo "\n";
echo longestUniqueSubstringLength("abcabcbb"); // Outputs 3 (the substring "abc")


// function reverseNumber(num) { return parseInt(num.toString().split('').reverse().join('')) }


function reverseNumber($num) {
    return (int)(strrev((string)$num));
}

// Example usage of reverseNumber function
echo "\n == Reverse Number == \n";
echo reverseNumber(12345); // Outputs 54321


// reference
$a = '1';
$b = &$a;
$b = "2";
echo "\n == reference == \n";
echo $a.", ".$b;
// Outputs: 2, 2


// Array sum
$input = '1,2,3,4,5,6,7';
echo "\n == string Sum == \n";
echo array_sum(explode(',',$input));


// 15. How would you implement a class in the following scenario?
// Suppose that you have to implement a class named Dragonball. This class must have an attribute named ballCount (which starts from 0) and a method iFoundaBall. When iFoundaBall is called, ballCount is increased by one. If the value of ballCount is equal to seven, then the message You can ask your wish is printed, and ballCount is reset to 0. How would you implement this class?

class Dragonball {
    private $ballCount;

    public function __construct(){
        $this->ballCount = 0;
    }

    public function iFoundBall(){
        $this->ballCount++;
        if ($this->ballCount === 7) {
            echo "You can ask your wish\n";
            $this->ballCount = 0;
        }
    }
}


// zero indicates an octal number in PHP
$i = 016;
echo $i / 2;
// Outputs: 6 (octal 16 is decimal 14, and 14 / 2 = 7)



//true and false in PHP

$x = true and false;
echo "\n == true and false == \n";
var_dump($x);

//
$x = 5;
echo $x;
echo "<br />";
echo $x+++$x++;
echo "<br />";
echo $x;
echo "<br />";
echo $x---$x--;
echo "<br />";
echo $x;

// $x output
$x = 3 + "15%" + "0";
echo "\n == x output == \n";
echo $x; // Outputs: 18 (the string "15%" is converted to 15, and "$25" is converted to 0, so 3 + 15 + 0 = 18)


$ceu = array(
    "Italy" => "Rome", "Luxembourg" => "Luxembourg",
    "Belgium" => "Brussels", "Denmark" => "Copenhagen",
    "Finland" => "Helsinki", "France" => "Paris",
    "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana",
    "Germany" => "Berlin", "Greece" => "Athens",
    "Ireland" => "Dublin", "Netherlands" => "Amsterdam",
    "Portugal" => "Lisbon", "Spain" => "Madrid",
    "Sweden" => "Stockholm", "United Kingdom" => "London",
    "Cyprus" => "Nicosia", "Lithuania" => "Vilnius",
    "Czech Republic" => "Prague", "Estonia" => "Tallin",
    "Hungary" => "Budapest", "Latvia" => "Riga",
    "Malta" => "Valetta", "Austria" => "Vienna",
    "Poland" => "Warsaw"
);

// Sort the associative array by values (capitals) in ascending order
asort($ceu);

// Iterate through the sorted array and echo the country and its capital
foreach ($ceu as $country => $capital) {
    echo "The capital of $country is $capital" . "\n";
}


//
// Define an associative array with non-sequential keys
$color = array(4 => 'white', 6 => 'green', 11 => 'red');

// Get First Element from Associative Array -- Output the value of the first element in the array using reset()
echo reset($color) . "\n";


// Decode JSON String
$jsonString = '{"name": "John", "age": 30, "city": "New York"}';
$jsonArray = json_decode($jsonString, true);
foreach ($jsonArray as $key => $value) {
    echo "$key: $value\n";
}

// // PHP Array Exercises : Inserts a new item in an array in any position
function insertItemInArray($array, $item, $position) {
    array_splice($array, $position, 0, $item);
    return $array;
}
$array = array( '1', '2', '3', '4', '5' );
$position = 3;
$item = '6';
$result = insertItemInArray($array, $item, $position);
echo "\n == Insert Item in Array == \n";
echo implode(", ", $result) . "\n"; // Outputs: 1, 2, 3, 6, 4, 5



// Sort Associative Array by Key and Value
function sortAssociativeArray($array){
    ksort($array); // Sort by key acscending
    return $array;
}

function ksortAssociativeArray($array){
    krsort($array); // Sort by key descending
    return $array;
}

$array2 = array("Sophia" => "31", "Jacob" => "41", "William" => "39", "Ramesh" => "40");
$result2 = sortAssociativeArray($array2);
echo "\n == Sorted Associative Array by Key == \n";
foreach ($result2 as $key => $value) {
    echo "$key: $value\n";
}

$array3 = array("Sophia" => "31", "Jacob" => "41", "William" => "39", "Ramesh" => "40");
$result3 = ksortAssociativeArray($array3);
echo "\n == Sorted Associative Array by Key == \n";
foreach ($result3 as $key => $value) {
    echo "$key: $value\n";
}


// PHP Array Exercises : Calculate and display average temperature

$month_temp = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73, 68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73";
$temp_array_length = count(explode(',', $month_temp));
echo $temp_array_length-5;

//PHP Array Exercises : Sort an array of positive integers using Bead Sort Algorithm

// function bead_sort($uarr)
// {
//     // Create an array of poles based on the values in the input array
//     foreach ($uarr as $e)
//         $poles [] = array_fill(0, $e, 1);

//     // Use 'array_map' to count the beads in each column of the transposed array
//     return array_map('count', columns(columns($poles)));
// }
// print_r(bead_sort(array(5, 3, 1, 3, 8, 7, 4, 1, 1, 3)));

#### 11. Merge Arrays by Index
$array1 = array(array(77, 87), array(23, 45));
// Define a simple array $array2
$array2 = array("w3resource", "com");
//print_r(array_merge($array1, $array2));

function mergeArraysByIndex($x, $y){
    $temp = array();

    $temp[] = $x;
    if(is_scalar($y)){
        echo "y is scalar\n";
        $temp[] = $y;
    }else{
        foreach ($y as $value) {
            $temp[] = $value;   
        }
    }

    return $temp;
}
print_r(mergeArraysByIndex($array2, $array1));


### 12. Change Array Values to Lower and Upper Case

$Color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');

function changeArrayValuesCase($array, $case = 'lower') {

    if ($case === 'lower') {
        return array_map('strtolower', $array);
    } elseif ($case === 'upper') {
        return array_map('strtoupper', $array);
    }
    return $array; // Return original if case is not recognized
}
$lowerCaseArray = changeArrayValuesCase($Color, 'lower');
$upperCaseArray = changeArrayValuesCase($Color, 'upper');
echo "\n == Lower Case Array == \n";
print_r($lowerCaseArray);
echo "\n == Upper Case Array == \n";
print_r($upperCaseArray);


## 13. Display Numbers Divisible by 4 Without Control Statements
$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
$divisibleBy4 = array_filter($numbers, function($num) {
    return $num % 4 === 0;
});
echo "\n == Numbers Divisible by 4 == \n";
print_r($divisibleBy4); 

