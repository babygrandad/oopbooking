<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location: index.php');
}
include('filePaths.php');
$fName = $_SESSION['fName'];
$lName = $_SESSION['lName'];
$email = $_SESSION['email'];
$stayDuration = $_SESSION['stayDuration'];
$hotel = $_SESSION['hotel'];
$checkin = $_SESSION['checkin'];
$checkout = $_SESSION['checkout'];
$_SESSION["hotelArray"] = $hotelData;
$dir = dirname(__FILE__);
$_SESSION['root'] = $dir;

if(!isset($_SESSION['secondChoice'])){
    $_SESSION['secondChoice'] = 'Melanie Hotel';
}
?>

<?php

$selected =  $_SESSION['secondChoice'];
$confirmChoice = $_SESSION['secondChoice'];

function getOptions($data, $select)
{
    $options = '';

    foreach ($data as $choice) {
        if ($select == $choice['name']) {
            $_SESSION['secondChoice'] = filter_var($select, FILTER_SANITIZE_STRING);
            $options .= '<option value="' . $choice['name'] . '" selected>' . $choice['name'] . '</>';
        } 
        else {
            $options .= '<option value="' . $choice['name'] . '">' . $choice['name'] . '</>';
        }
    }

    return $options;
}

if (isset($_POST['otherHotels'])) {
    $selected = $_POST['otherHotels'];
    
}

$totalCost = 0;
$cost = 0;
foreach ($hotelData as $choice) {
    if ($choice['name'] == $hotel) {
        $totalCost = $choice['daily_rate'] * $stayDuration;
        $cost = $choice['daily_rate'];
    }
}

function feature($hname, $hfeature, $data)
{
    foreach ($data as $hotel) {
        if ($hotel['name'] == $hname) {
            if ($hotel[$hfeature] == true) {
                echo '<i class="fa-solid fa-circle-check fa-lg"></i>';
            } else {
                echo '<i class="fa-sharp fa-solid fa-circle-xmark fa-lg"></i>';
            }
        }
    }
}

function valueText($hname, $hfeature, $data)
{
    foreach ($data as $hotel) {
        if ($hotel['name'] == $hname) {
            echo $hotel[$hfeature];
        }
    }
}

function cost($hname, $hfeature, $data)
{
    foreach ($data as $hotel) {
        if ($hotel['name'] == $hname) {
            echo $hotel[$hfeature] * $_SESSION['stayDuration'];
        }
    }
}

if(isset($_POST['confirm'])){
    $confirmChoice = $_POST['finalDecision'];
    if($confirmChoice == 1){
        header('location: compare.php#confirm');
    }
    else{
        echo 'Right chosen';
        $_SESSION['hotel'] = $selected;
        header('location: compare.php#confirm');
    }
}

if (isset($_POST['logout'])){
    header('location: logout.php');
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/compare.css">
    <link rel="stylesheet" href="css/global styles.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous" defer></script>
</head>

<body>

    <header class="row">
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <a href="dashboard.php" class="navbar-brand">Dashboard</a>
                <div class="d-flex" role="search">
                    <form action="compare.php" method="post">
                        <button name='logout' onclick="this.form.submit()">Log Out</button>
                        <span class="nameSpace"> <?php echo "Hi ".ucfirst($fName)." ".ucfirst($lName) ?> </span>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="row hotelChioceContainer">
        <div class="col-8 m-auto">
            <form class="row" action='compare.php' method="POST">
                <select name="otherHotels" id="otherHotels" onchange="this.form.submit()">
                    <option value="" disabled></option>
                    <?php
                    echo getOptions($hotelData, $selected);
                    ?>
                </select>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-6 indicator left-indicator"><h5>Your selection</h5></div>
        <div class="col-6 indicator right-indicator"><h5>Other options</h5></div>
    </div>

    <div class="row compareFormsContainer">
        <form id="leftForm" class="col-4 choicesForm" action="compare.php" method="post">
            <div class="choiceStatus">
                <p class="featureValue"><?php valueText($_SESSION['hotel'], "name", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php valueText($_SESSION['hotel'], "daily_rate", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php cost($_SESSION['hotel'], "daily_rate", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "wifi", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "pool", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "bar", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "parking", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "kid_friendly", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "room_service", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "day_care", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "spa", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($_SESSION['hotel'], "kitchen", $hotelData); ?></p>
            </div>
        </form>
        <div class="col-4 choiceDetails">
            <div class="featureBox">
                <p class="featureName">name</p>
            </div>
            <div class="featureBox">
                <p class="featureName">daily rate</p>
            </div>
            <div class="featureBox">
                <p class="featureName">Cost</p>
            </div>
            <div class="featureBox">
                <p class="featureName">wifi</p>
            </div>
            <div class="featureBox">
                <p class="featureName">pool</p>
            </div>
            <div class="featureBox">
                <p class="featureName">bar</p>
            </div>
            <div class="featureBox">
                <p class="featureName">parking</p>
            </div>
            <div class="featureBox">
                <p class="featureName">kid_friendly</p>
            </div>
            <div class="featureBox">
                <p class="featureName">room_service</p>
            </div>
            <div class="featureBox">
                <p class="featureName">day_care</p>
            </div>
            <div class="featureBox">
                <p class="featureName">spa</p>
            </div>
            <div class="featureBox">
                <p class="featureName">kitchen</p>
            </div>
        </div>
        <form id="rightForm" class="col-4 choicesForm" action="compare.php" method="post">
            <div class="choiceStatus">
                <p class="featureValue"><?php valueText($selected, "name", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php valueText($selected, "daily_rate", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php cost($selected, "daily_rate", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "wifi", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "pool", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "bar", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "parking", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "kid_friendly", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "room_service", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "day_care", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "spa", $hotelData); ?></p>
            </div>
            <div class="choiceStatus">
                <p class="featureValue"><?php feature($selected, "kitchen", $hotelData); ?></p>
            </div>
        </form>

    </div>

    <div class="finalSelectContainer row">
        <h5 class='instruction m-auto'>Please select your final choice by clicking on the left or right button. 
            Each button corresponds to the hotel on its respective side</h5>
        <form action="compare.php" method="post" id='confirm'>
            <div class="row">
                <div class="col-6 finalDecision leftDecision">
                    <p><?php valueText($_SESSION['hotel'], "name", $hotelData); ?></p>
                    <input type="radio" name="finalDecision" id="optionA" value="1">
                </div>
                <div class="col-6 finalDecision rightDecision">
                    <p><?php valueText($selected, "name", $hotelData); ?></p>
                    <input type="radio" name="finalDecision" id="optionB" value="2">
                </div>
                <div class="finalButtonContainer">
                    <input type="submit" value="Confirm Booking" name='confirm'>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="confirmDetails m-auto col-md-4">
            <?php
                echo $message ='<h1>Booking Confirmation</h1>
                <h3>Guest name:</h3>
                <p>'.ucfirst($fName).' '.ucfirst($lName).'</p>
                <h3>Guest email</h3>
                <p>'.$email.'</p>
                <h3>Hotel Choice</h3>
                <p>'.$hotel.'</p>
                <h3>Stay Duration</h3>
                <p>'.$stayDuration.' days at a daily rate of '.$cost.' bringning the total to '.$totalCost.'.</p>
                <h3>Check in:</h3>
                <p>'.$checkin.'</p>
                <h3>Check out:</h3>
                <p>'.$checkout.'</p>'
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="js/compare.script.js"></script>
</body>

</html>