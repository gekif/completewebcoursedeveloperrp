<!--<p>Please enter a whole number</p>-->
<!--<form method="post">-->
<!--    <input name="number" type="text">-->
<!--    <input type="submit" value="Go!!">-->
<!--</form>-->

<form method="post">
    <p>What is your name</p>
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>


<?php
//print_r($_POST);

if ($_POST) {
    $family = ['Fikar', 'Ani', 'Fida', 'Rayhan'];
    $isKnown = false;

    foreach ($family as $fam) {
        if ($fam == $_POST['name']) {
            $isKnown = true;
        }
    }

    if ($_POST['name'] == "") {
		echo '<h1>Please insert the name woiii</h1>';
	} else if ($isKnown) {
        echo '<h1>Hi There ' . $_POST['name'] . '!!!</h1>';
    } else {
        echo "<h1>I don't know you</h1>";
    }
}
