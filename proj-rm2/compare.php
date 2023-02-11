<?php
session_start();
require_once('logic/enforceLogin.php');
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
    <?php include_once('templates/loggedinNav.php'); ?>

    <?php echo (open_table_container('Maybe you might want to compare againt other hotels? Pick from the list below.')); ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="mb-4 form-floating col-11 m-auto">
            <select class="form-select" name="" id="">
            <?php include_once('templates/hotelOptions.php');
            hotel_select_options('');
            ?>
            </select>
            <label class="text-primary" for="">See other options</label>
        </div>
    </form>

    <!-- table headers here -->
    <div class="row container-fluid m-auto">
        <div class="col-4 border table-headers">
            <h5>Your Choice</h5>
        </div>
        <div class="col-4 border table-headers">
            <h5>Hotel</h5>
        </div>
        <div class="col-4 border table-headers">
            <h5>Other Options</h5>
        </div>
    </div>

    <!-- table rows from here -->
    <?php include_once('templates/tableRows.php')?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="m-auto mt-4 col-8 col-sm-5 col-md-4 col-lg-3">
        <div class="mb-4">
            <!--Final chice decision in here-->
            <?php
            include('templates/finalChoice.php');
            ?>
        </div>
        <div class="d-grid ">
            <button class="btn btn-primary" type="submit">Confirm Booking</button>
        </div>
    </form>

    <?php include_once('templates/confirmDetails.php'); ?>

    <?php echo (close_continer()); ?>

</body>

</html>