<?php

//array_map
$names = ['john', 'jane', 'peter'];
$uppercasedNames = array_map('strtoupper', $names);
print_r($uppercasedNames);