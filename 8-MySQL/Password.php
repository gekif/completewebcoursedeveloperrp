<?php
//echo md5("password");
//echo md5("28sjhafjkashdf82rujauisdnfuandfn28uerjewFJNJASD");
//$salt = "72347jsdfhjasdfjashfj";
$row['id'] = 73;

//echo md5($salt . "password");
echo md5(md5($row['id']) . "password");