<?php

$user = 'fikar';

if($user == 'fikar') {
    echo "hello $user";
} else {
    echo "you're not $user";
}

echo '<br>';

$age = 25;
$age = 30;
$user = 'febrina';

//if ($age >= 18 && $user == 'fikar') {
if ($age >= 18 || $user == 'fikar') {
    echo "hi $user, you're $age year's old and you may proceed";
} else {
    echo "hi $user, you're not $age year's old and you're not may proceed";
}