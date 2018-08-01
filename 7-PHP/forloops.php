<?php

/**
 * For loops
 */

//for ($i = 1; $i <= 10; $i++) {
//    echo "$i. hello world<br>";
//}

//for ($i = 1; $i <= 15; $i += 2) {
//    echo "$i. hello world<br>";
//}

//for ($i = 10; $i > 0; $i -= 2) {
//    echo "$i. hello world<br>";
//}

/**
 * Loops Array
 */

$family = ['Robert', 'Matius', 'Pakpahan', 'Meity'];

// Using for loop
//for ($i = 0; $i < sizeof($family); $i++) {
//    echo $family[$i] . "<br>";
//}

// For each loops
foreach ($family as $key => $value) {
    $family[$key] = $value . ' SPTRD';
    echo "Array number " . $key . " is " . $value . '<br>';
}

for ($i = 0; $i < sizeof($family); $i++) {
    echo $family[$i] . "<br>";
}
