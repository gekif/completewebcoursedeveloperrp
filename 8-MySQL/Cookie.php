<?php

//setcookie("customerId", "1234", time() + 60 * 60 * 24);

setcookie("customerId", "", time() + 60 * 60);

// Update the cookie
//$_COOKIE["customerId"] = "test";

echo $_COOKIE["customerId"];