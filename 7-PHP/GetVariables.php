<!--<p>What is your name?</p>-->
<!--<form>-->
<!--    <input name="name" type="text">-->
<!--    <input type="submit" value="Go!!">-->
<!--</form>-->

<p>Please enter a whole number</p>
<form>
        <input name="number" type="text">
        <input type="submit" value="Go!!">
</form>
<?php
//print_r($_GET);
//echo '<br>';
//echo '<h1>Hi There ' . $_GET['name'] . '</h1>';

//echo '<h1>Your chosen number is ' . $_GET['number'] . '</h1>';



/**
 * Check prime number
 */

/*if ($_GET) {
    $i = 2;
    $isPrime = true;

    while ($i < $_GET['number']) {
        if ($_GET['number'] % $i == 0) {

            // Number is not prime
            $isPrime = false;
        }
        $i++;
    }


    if ($isPrime) {
        echo '<h1>' . $i . ' is a prime number</h1>';
    } else {
        echo '<h1>' . $i . ' is not a prime number</h1>';
    }
}*/


/**
 * Check the number numeric or not
 */
$number = $_GET['number'];

if (is_numeric($number) && $number > 0 && $number == round($number, 0)) {
    $i = 2;
    $isPrime = true;

    while ($i < $_GET['number']) {
        if ($_GET['number'] % $i == 0) {

            // Number is not prime
            $isPrime = false;
        }
        $i++;
    }


    if ($isPrime) {
        echo '<h1>' . $i . ' is a prime number</h1>';
    } else {
        echo '<h1>' . $i . ' is not a prime number</h1>';
    }
} else if ($number) {

    // User has sumbmitted something which is not a positive whole number
    echo '<h1>please enter a positive number</h1>';
}



