<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mailResponse = '';
ob_start();

if (!$mailResponse == 'Message has been sent') {

    
    // Load Composer's autoloader
    require 'vendor/autoload.php';


    // my imports_+_+_+_+_+_+_+_+_+_+_

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


    $subject = 'Web application test mail.';
    $message =
        '<h1>New Booking</h1>
    <h3>Guest name:</h3>
    <p>' . ucfirst($fname) . ' ' . ucfirst($lname) . '</p>
    <h3>Guest email</h3>
    <p>' . $email . '</p>
    <h3>Hotel Choice</h3>
    <p>' . $hotel . '</p>
    <h3>Stay Duration</h3>
    <p>' . $stayDuration . ' days at a daily rate of ' . $cost . ' bringning the total to ' . $totalCost . '.</p>
    <h3>Check in:</h3>
    <p>' . $checkin . '</p>
    <h3>Check out:</h3>
    <p>' . $checkout . '</p>';

    // my imports_+_+_+_+_+_+_+_+_+_+_

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'b2d7d1788a8c08';                       // SMTP username
        $mail->Password   = 'de45537a61dbc0';                       // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email, 'Mailer');
        $mail->addAddress('relebogilenkotswe@gmail.com', 'Lebza');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;


        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $mailResponse = 'Message has been sent';        
        ob_end_flush();
        header('location: '.$_SESSION['root'].'/compare.php');
        
    } 
    catch (Exception $e) {
        $mailResponse = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    $_SESSION['mailResponse'] = $mailResponse;
    return $mailResponse;
    
};

echo "something";

header('location: ../proj/compare.php');

echo ' else';


// $_SESSION['mailResponse'] = $mailResponse;