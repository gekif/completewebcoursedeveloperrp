<?php

include('MySQLConnect.php');

if (mysqli_connect_errno()) {
    die('not connected');
}

//$email = 'guntur@gmail.com';
//$password = '123';

/**
 * Insert
 */
//$query = "INSERT INTO users (email, password) VALUES ('febrina@gmail.com', '123456')";
//$query = "INSERT INTO users (email, password) VALUES ('{$email}', '{$password}')";

/**
 * Update
 */
$query = "UPDATE users SET email = 'fikar@gmail.com', password = '12345' WHERE id = 1 LIMIT 1";


mysqli_query($conn, $query);

$query = "SELECT * FROM users";

//if (mysqli_query($conn, $query)) {
if ($result = mysqli_query($conn, $query)) {
//    echo "Query is succesfull";
    $row = mysqli_fetch_array($result);
//    print_r($row);
    echo 'Your email is ' . $row['email'] . ' and your password is \'' . $row['password'] . '\'<br>';
}


//else {
//    echo 'query failed';
//}
