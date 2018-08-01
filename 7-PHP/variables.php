
<?php
//$space = '<br>';
$name = 'Fikar';
echo "<p>My name is $name</p>";

$string1 = '<p>This is the first part';
$string2 = ' of a sentence</p>';
echo $string1 . $string2;

$myNumber = 45;
$calculation = $myNumber + 10;
echo '<p>The result is ' . $calculation . '</p>';

$myBool = true;
echo "<p>This statement is true? " . $myBool . '</p>';

$variableName = 'name';
echo $$variableName;
