<?php
session_start();
$fname = $_SESSION['fName'];
$lname = $_SESSION['lName'];
$email = $_SESSION['email'];
$stayDuration = $_SESSION['stayDuration'];
$hotel = $_SESSION['hotel'];
$checkin = $_SESSION['checkin'];
$checkout = $_SESSION['checkout'];
$hotelData = $_SESSION["hotelArray"];

$totalCost = 0;
$cost = 0;
foreach ($hotelData as $choice) {
    if ($choice['name'] == $hotel) {
        $totalCost = $choice['daily_rate'] * $stayDuration;
        $cost = $choice['daily_rate'];
    }
}




$to = 'relebogilenkotswe@gmail.com';
$subject = 'Web application test mail.';
$headers .= 'From: The Xammp test Project ' .$email.'\r\n';
$headers .= 'Content-type: text/html\r\n';

$message = 
'<h1>New Booking</h1>
<h3>Guest name:</h3>
<p>'.ucfirst($fname).' '.ucfirst($lname).'</p>
<h3>Guest email</h3>
<p>'.$email.'</p>
<h3>Hotel Choice</h3>
<p>'.$hotel.'</p>
<h3>Stay Duration</h3>
<p>'.$stayDuration.' days at a daily rate of '.$cost.' bringning the total to '.$totalCost.'.</p>
<h3>Check in:</h3>
<p>'.$checkin.'</p>
<h3>Check out:</h3>
<p>'.$checkout.'</p>';

echo $message;

try {
    mail($to, $subject, $message, $headers);
} catch (Exception $ex) {
    echo "Something went wrong look at the error:<br>".$ex;
}

// mail($to, $subject, $message, $headers);

?>