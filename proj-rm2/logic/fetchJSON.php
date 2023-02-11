<?php 

function get_hotels(){
    $json = file_get_contents(dirname(__DIR__)."../json/hotels.json");
    return $data = json_decode($json, true);
}

function get_users(){
    $json = file_get_contents(dirname(__DIR__)."../json/users.json");
    return $data = json_decode($json, true);
} 

function get_bookings(){
    $json = file_get_contents(dirname(__DIR__)."../json/bookings.json");
    return $data = json_decode($json, true);
} 
?>

