<?php

session_start();
//
//$_SESSION['username'] = 'fikar';
//echo $_SESSION['username'];

if ($_SESSION['email']) {
    echo "You're logged in";
} else {
    header("Location: SessionDemo.php");
}