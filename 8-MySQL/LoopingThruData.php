<?php

include('MySQLConnect.php');

if (mysqli_connect_errno()) {
    die('not connected');
}

if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {
//    print_r($_POST);
    if ($_POST['email'] == '') {
        echo '<p>Email address is required</p>';
    } else if ($_POST['password'] == '') {
        echo '<p>Password is required</p>';
    } else {
        $query = "SELECT id FROM users WHERE email = '" .
            mysqli_real_escape_string($conn, $_POST['email']) ."'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<p>That email address has already been taken</p>';
        } else {
            $query = "INSERT INTO users (email, password) VALUES ('" .
                mysqli_real_escape_string($conn, $_POST['email']) . "'" . ", '" .
                mysqli_real_escape_string($conn, $_POST['password']) . "')";
        }

        if (mysqli_query($conn, $query)) {
            echo "<p>You've been sign up</p>";
        } else {
            echo "<p>There is a problem, hubungi admin</p>";
        }

    }
}
?>
<!--
//$name = "Dzulfikar Maulana";

//$query = "SELECT * FROM users";
//$query = "SELECT * FROM users WHERE id = 1";
//$query = "SELECT * FROM users WHERE email = 'fikar@gmail.com'";
//$query = "SELECT * FROM users WHERE email LIKE '%fikar%'";
//$query = "SELECT * FROM users WHERE  id >= 2";
//$query = "SELECT * FROM users WHERE  id >= 2 AND email LIKE '%f%'";
//$query = "SELECT * FROM users WHERE  name LIKE '%" . mysqli_real_escape_string($conn, $name) . "%'";
//$query = "SELECT email FROM users WHERE  name LIKE '%" . mysqli_real_escape_string($conn, $name) . "%'";

/*if ($result = mysqli_query($conn, $query)) {

    while ($row = mysqli_fetch_array($result)) {
        print_r($row);
    }
}*/
-->

<!--
/** The Scenario
 * Ask for email and password
 * Check tat the email and password have been entered
 * Check that email address is not already registered
 * Sign the user uo
 */
 -->

<form method="post">
    <input name="email" type="email" placeholder="Email Address">
    <input name="password" type="password" placeholder="Password">
    <input type="submit" value="Sign Up">
</form>
