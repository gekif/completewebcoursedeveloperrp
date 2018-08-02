<?php

$weather = "";
$error = "";

if (array_key_exists('city', $_GET['city'])) {

    $city = str_replace(' ', '' . $_GET['city']);
    $file_headers = @get_headers("https://www.weather-forecast.com/locations/" . $city . "/forecasts/latest");


    if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
//        $exists = false;
        $error = 'The city gak ketemu';
    } else {
    $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/" . $city . "/forecasts/latest");

    $pageArray = explode('<h2>10 Day Jakarta Weather</h2>(7&ndash;10 days)</span><p class="b-forecast__table-description-content"><span class="phrase">Heavy rain (total 31mm), heaviest during Sat afternoon. Warm (max 32&deg;C on Sat morning, min 27&deg;C on Wed night). Wind will be generally light.', $forecastPage);
//    echo $pageArray[1];

    if (sizeof($pageArray) > 1) {
        $secondPageArray = explode('</p></span>', $pageArray[1]);

        if (sizeof($secondPageArray) > 1) {
            $weather = $secondPageArray[0];
        } else {
            $error = 'The city gak ketemu';
        }
    } else {
        $error = 'The city gak ketemu';
    }

    }
}