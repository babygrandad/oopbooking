<?php 
session_start();
require_once('logic/enforceLogin.php');
require_once('logic/calculateDates.php');
    if (isset($_GET['hotel_name'])) {
        $_SESSION['hotel_name'] = $_GET['hotel_name'];
    }

    if(isset($_POST['bookNow'])){
        $_SESSION['hotel_name'] = $_POST['hotel'];
        $_SESSION['checkin'] = $_POST['checkin'];
        $_SESSION['checkout'] = $_POST['checkout'];

        $_SESSION['stay_duration'] =  calculate_dates($_POST['checkin'],$_POST['checkout']);
            

        header('location: compare.php');
    }

require_once('logic/sessionLogic.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('templates/header.php');
echo (page_title('Book Now'));
?>

<body>

    <?php
    require_once('templates/loggedinNav.php');
    include('templates/containers.php');
    ?>

    <main>
<?php echo (open_form_container('Book your stay'));
?>
        <form id="bookingForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="mb-4 form-floating">
            <select class="form-select" name="hotel" id="" >
                <?php include_once('templates/hotelOptions.php');
                hotel_select_options($hotel_name)
                ?>
            </select>
                <label for="" class="form-label">Hotel</label>
            </div>
            <div class="mb-4 form-floating">
                <input class="form-control" type="date" name="checkin" id="check_in_input">
                <label for="" class="form-label">Check in Date</label>
                <span id="inDateWarning" class="fs-6 text-danger"></span>
            </div>
            <div class="mb-4 form-floating">
                <input class="form-control" type="date" name="checkout" id="check_out_input">
                <label for="" class="form-label">Check out Date</label>
                <span id="outDateWarning" class="fs-6 text-danger"></span>
            </div>
            <div class="mb-4 form-floating">
                <input type="text" name="StayDuration" class="form-control" id="duration_display" disabled></input>
                <label for="" class="form-label">Stay Duration</label>
                <span id="" class="fs-6 text-danger"></span>
            </div>
            <div class="mb-4 form-group d-grid">
                <button class="btn btn-lg btn-secondary" type="submit" name="bookNow">Book Now</button>
            </div>
        </form>

<?php echo(close_continer())
?>
    </main>
    
</body>


</html>