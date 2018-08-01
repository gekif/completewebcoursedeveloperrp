<?php

$myArray = ['fikar', '1', '2', '3'];
$myArray[] = 'nani';
print_r($myArray);

echo "<br>";
echo $myArray[0];

echo "<br>";
$anotherArray[0] = 'Agus';
$anotherArray[1] = 'Yoghurt';
$anotherArray[5] = 'Tofi';
$anotherArray['binatang'] = 'anjing';
print_r($anotherArray);

echo "<br>";
$thirdArray = [
    'indonesia' => 'bahasa indonesia',
    'inggris' => 'bahasa inggris',
    'malaysia' => 'bahasa malaysia'
];
print_r($thirdArray);

echo "<br>";
echo sizeof($thirdArray);

echo "<br>";
unset($thirdArray["indonesia"]);
print_r($thirdArray);

echo "<br>";
echo sizeof($thirdArray);