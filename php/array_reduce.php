<?php

$numbers = [1, 2, 3, 4, 5];

$sum = array_reduce(
    $numbers,
    function($carry, $item) {
        return $carry + $item;
    },
    0 // initial value of sum is zero 
);

echo $sum . "\n"; // Output: 15

$multiply = array_reduce(
    $numbers,
    function($carry, $item){
        return $carry * $item;
    },
    1
);

echo $multiply . "\n";  // Output: 120


// Grouping Data:::
$products = [
    ['name' => 'Laptop', 'category' => 'Electronics'],
    ['name' => 'Headphones', 'category' => 'Electronics'],
    ['name' => 'T-shirt', 'category' => 'Fashion'],
    ['name' => 'Jeans', 'category' => 'Fashion'],
    ['name' => 'Book', 'category' => 'Books'],
];

$groupedProducts = array_reduce(
    $products,
    function($carry, $item){
        $category = $item['category'];

        if(!isset($carry[$category])){
            $carry[$category] = [];
        }

        $carry[$category][] = $item;

        return $carry;
    },
    [] // initial value of groupData is empty array
);

print_r($groupedProducts);


$numbers = [42, 19, 67, 35, 88, 10];
$emptyArray = [];

// Finding the maximum value with robust initial value
$maxWithRobustInitial = array_reduce(
    $numbers,
    fn($carry, $item) => max($carry, $item),
    PHP_INT_MIN // Start with the smallest possible integer
);

// Finding the minimum value with robust initial value
$minWithRobustInitial = array_reduce(
    $numbers,
    fn($carry, $item) => min($carry, $item),
    PHP_INT_MAX // Start with the largest possible integer
);

echo "Max value: " . $maxWithRobustInitial . "\n"; // Output: 88
echo "Min value: " . $minWithRobustInitial . "\n"; // Output: 10

