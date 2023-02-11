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

if(isset($_SESSION['stay_duration'])){
    $stayDuration = $_SESSION['stay_duration'];

}

if(isset($_SESSION['hotel_name'])){
    $hotel_name = $_SESSION['hotel_name'];

}

if(isset($_SESSION['checkin'])){
    $checkin = $_SESSION['checkin'];

}

if(isset($_SESSION['checkout'])){
    $checkout = $_SESSION['checkout'];

}

//debate if you need to have this session variable saved.
if(isset($_SESSION['price'])){
    $price = $_SESSION['price'];
}
?>