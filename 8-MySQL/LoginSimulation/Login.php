<?php
session_start();

if (array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {
    echo "<h1 style='color: green'>Logged in: <a href='SignUp.php?logout=1'>Log Out</a></h1>";
} else {
    header("Location: SignUp.php");
}