<?php 
session_start();
require_once('logic/enforceLogin.php');
    if (isset($_GET['hotel_name'])) {
        $_SESSION['hotel_name'] = $_GET['hotel_name'];
    }

    if(isset($_POST['bookNow'])){
        $_SESSION['hotel_name'] = $_POST['hotel'];
        $_SESSION['checkin'] = $_POST['checkin'];
        $_SESSION['checkout'] = $_POST['checkout'];

        $date1 = new DateTime($_POST['checkin']);
        $date2 = new DateTime($_POST['checkout']);
        $interval = $date1->diff($date2);
        //echo $interval->format('The difference between the two dates is %a days');

        $_SESSION['stay_duration'] = $interval->d;

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
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="mb-5 form-floating">
            <select class="form-select" name="hotel" id="" >
                <?php include_once('templates/hotelOptions.php');
                hotel_select_options($hotel_name)
                ?>
            </select>
                <label for="" class="form-label">Hotel</label>
            </div>
            <div class="mb-5 form-floating">
                <input class="form-control" type="date" name="checkin" id="">
                <label for="" class="form-label">Check in Date</label>
            </div>
            <div class="mb-5 form-floating">
                <input class="form-control" type="date" name="checkout" id="">
                <label for="" class="form-label">Check out Date</label>
            </div>
            <div class="mb-5 form-floating">
                <span type="text" name="StayDuration" id="" class="form-control"></span>
                <label for="" class="form-label">Stay Duration</label>
                <span class="fs-6 "></span>
            </div>
            <div class="mb-5 form-group d-grid">
                <button class="btn btn-lg btn-secondary" type="submit" name="bookNow">Book Now</button>
            </div>
        </form>

<?php echo(close_continer())
?>
    </main>

</body>


</html>