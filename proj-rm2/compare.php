<?php
session_start();
require_once('logic/enforceLogin.php');
include('logic/commitBooking.php');
require_once('logic/calculateDates.php');
$price;

if(!isset($_SESSION['stay_duration']) && !isset($_SESSION['hotel_name'])){
    header('location: bookStay.php');
}

if(isset($_POST["final_choice"])){
    $_SESSION['hotel_name']= $_POST["final_choice"];
    require('logic/sessionLogic.php');
    commit_booking($email,$hotel_name,$checkin,$checkout,$stayDuration,$price);
    unset($_SESSION['stay_duration'], $_SESSION['hotel_name'], $_SESSION['price'], $_SESSION['checkin'], $_SESSION['checkout']);
    header('location: dashboard.php');
}

if(isset($_POST["second_choice"])){
    $secondChoice = $_POST["second_choice"];
}else{
    $secondChoice = "Melanie Hotel";
}

require_once('logic/sessionLogic.php');
?>


<!DOCTYPE html>
<html lang="en">
<?php
require_once('templates/containers.php');
require_once('templates/header.php');
echo (page_title("Confirm"));
?>

<body>
    <?php include_once('templates/loggedinNav.php');

    echo (open_table_container('Maybe you might want to compare againt other hotels? Pick from the list below.')); ?>

    <form id="second_choice" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="mb-4 form-floating col-11 m-auto">
            <select class="form-select" name="second_choice"  onchange="document.getElementById('second_choice').submit();" >
            <?php include_once('templates/hotelOptions.php');
            hotel_select_options($secondChoice);
            ?>
            </select>
            <label class="text-primary" for="">See other options</label>
        </div>
    </form>

    <!-- table headers here -->
    <div class="row container-fluid m-auto">
        <div class="col-4 border table-headers">
            <h5><?= $hotel_name?></h5>
        </div>
        <div class="col-4 border table-headers">
            <h5>Hotel</h5>
        </div>
        <div class="col-4 border table-headers">
            <h5><?= $secondChoice?></h5>
        </div>
    </div>

    <!-- table rows from here -->
    <?php include_once('templates/tableRows.php')?>

    <form id="final_choice" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="m-auto mt-4 col-8 col-sm-5 col-md-4 col-lg-3">
        <div class="mb-4">
            <!--Final chice decision in here-->
            <?php
            include('templates/finalChoice.php');
            ?>
        </div>
        <!-- <div class="d-grid ">
            <button class="btn btn-primary" type="submit">Confirm Booking</button>
        </div> -->
    </form>

    <?php include_once('templates/confirmDetails.php'); ?>

    <?php echo (close_continer()); ?>
<script src="js/compareValidation.js" defer></script>
</body>

</html>