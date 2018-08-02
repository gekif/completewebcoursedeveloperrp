<?php

include('MySQLConnect.php');
//echo mysqli_connect_errno();

if (mysqli_connect_errno()) {
    echo 'not connected';
} else {
    echo 'connected';
}