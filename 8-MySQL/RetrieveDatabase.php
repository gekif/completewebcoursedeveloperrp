<?php

include('MySQLConnect.php');
//echo mysqli_connect_errno();

if (mysqli_connect_errno()) {
    die('not connected');
}

$query = "SELECT * FROM users";

//if (mysqli_query($conn, $query)) {
if ($result = mysqli_query($conn, $query)) {
//    echo "Query is succesfull";
    $row = mysqli_fetch_array($result);
//    print_r($row);
//    print_r($row);
    echo 'Your email is ' . $row['email'] . ' and your password is \'' . $row['password'] . '\'';
}
