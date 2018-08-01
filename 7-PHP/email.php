<?php

$emailTo = 'dzulfikar.maulana@gmail.com';
$subject = 'informasi penting';
$body = 'Penting Banget';
$headers = 'From: flora@gmail.com';

//mail($emailTo, $subject, $body, $headers);

if (mail($emailTo, $subject, $body, $headers)) {
    echo 'Email success';
} else {
    echo 'Email could not sent';
}