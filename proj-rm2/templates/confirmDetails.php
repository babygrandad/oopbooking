<?php
$price = $hotel_daily_rate * $stayDuration;
?>

<div class="p-2 mb-4 border rounded bg-light m-auto mt-5 col-xs-10 col-md-6 col-lg-4">
    <h4>Booking Information</h4>
    
    <p class="fw-bold"><?= $fName .' '. $lName ?></p>
    <p class="fst-italic fw-semibold"><?= $email?></p>
    <p class="fw-bold"><?= $hotel_name?></p>
    <p><?= $checkin ." to ". $checkout ?></p>
    <p>Your stay is: <?= $stayDuration?> days</p>
    <p>Price: R<?= $price?></p>

    <div class="d-grid col-10 m-auto">
            <button class="btn btn-primary" type="button" onclick="document.getElementById('final_choice').submit();">Confirm Booking</button>
    </div>
</div>