<?php
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = 'password';
const DB = 'completecourse';

$conn = mysqli_connect(HOST, USER, PASSWORD, DB);

if (mysqli_connect_error()) {
    die ("Gak koneks coyyy");
}

?>