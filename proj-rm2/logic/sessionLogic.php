<?php
if(isset($_SESSION['fName'])){
    $fName = ucfirst($_SESSION['fName']);

}

if(isset($_SESSION['lName'])){
    $lName = ucfirst($_SESSION['lName']);

}

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

}

if(isset($_SESSION['stayDuration'])){
    $stayDuration = $_SESSION['stayDuration'];

}

if(isset($_SESSION['hotel'])){
    $hotel = $_SESSION['hotel'];

}

if(isset($_SESSION['checkin'])){
    $checkin = $_SESSION['checkin'];

}

if(isset($_SESSION['checkout'])){
    $checkout = $_SESSION['checkout'];

}

if(isset($_SESSION['hotelArray'])){
    $hotelData = $_SESSION['hotelArray'];

}


?>