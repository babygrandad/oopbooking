<?php 
session_start();
require_once('logic/enforceLogin.php');
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
            <select class="form-select" name="" id="" >
                <?php include_once('templates/hotelOptions.php')?>
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
                <input type="text" name="StayDuration" id="" class="form-control" disabled readonly>
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