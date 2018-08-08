<?php

session_start();

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'password';
const DATABASE = 'finalprojectccrp';

$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

if (mysqli_connect_errno()) {
    print_r(mysqli_connect_errno());
    exit();
}

if (isset($_GET['function']) == 'logout') {
    session_unset();
}