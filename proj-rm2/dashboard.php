<?php
session_start();
require_once('logic/enforceLogin.php');
require_once('logic/sessionLogic.php');
?>


<!DOCTYPE html>
<html lang="en">
<?php
require_once('templates/header.php');
echo (page_title('Dashboard'));
?>
<body>

    <?php
    require_once('templates/loggedinNav.php');
    ?>

    <main class="container content-main">
    <div class="row gx-5">
        <div class="col-lg-8 bg-light pt-4 pb-4 ">
            <H1>Hotels</H1>
            <div class="container card-container dashboard-columns-wrap">
            <?php 
            include('templates/cards.php');
            ?>
            </div>
        </div>
        <div class="col-lg-4 pt-4 bp-4 ">
            <h1>Previous Bookings</h1>
            <div class="container dashboard-columns-wrap">
                <?php
                include('templates/prevBookings.php');
                include('templates/prevBookings.php');
                include('templates/prevBookings.php');
                include('templates/prevBookings.php');
                ?>
            </div>
        </div>
    </div>
    </main>
</body>

</html>