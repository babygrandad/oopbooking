<?php

    $hotelDataFile = 'json/hotels.json';
    $hotelData = file_get_contents($hotelDataFile);
    $hotelData = json_decode($hotelData, TRUE);

    $usersDataFile = 'json/users.json';
    $userData = file_get_contents($usersDataFile);
    $userData = json_decode($userData, TRUE);

?>