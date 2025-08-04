<?php
$data = [
    ['id' => 1, 'name' => 'Alice'],
    ['id' => 2, 'name' => 'Bob'],
];

$filter = $_GET['name'] ?? null;

if ($filter) {
    $data = array_filter($data, fn($row) => stripos($row['name'], $filter) !== false);

    // array_filter($data, function($row){
    //     return stripos($row['name'], $filter) !== false;
    // })

    $data = array_filter($data, fn($row) => stripos($row['name'], $filter) !== false);
}

header('Content-Type: application/json');
echo json_encode(array_values($data));
