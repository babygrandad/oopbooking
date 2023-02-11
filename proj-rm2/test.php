<?php
session_start();
require_once('logic/fetchJSON.php');
require('logic/sessionLogic.php');

// Store incoming array 
$array[] = get_bookings();


$newBooking =[
"email" => $email,
"hotel_name" => $hotel_name,
"checkin" => $checkin,
"checkout" => $checkout,
"stay_duration" => $stayDuration,
"price" => $price
];

array_push($array,$newBooking);

// Encode the array back into a JSON string
$json = json_encode($array);

// Write the JSON string back to the file
file_put_contents("json/bookings.json", $json, JSON_PRETTY_PRINT);

?>
