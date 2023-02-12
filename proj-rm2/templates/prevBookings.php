<?php
require_once('logic/fetchJSON.php');
require('logic/calculateDates.php');
require('logic/updateJSON.php');


foreach(array_reverse(get_bookings()) as $booking){ 
    if($booking['email'] === $email){
        $booked_hotel = $booking['hotel_name']; 
        $bookingIn = $booking['checkin'];
        $bookingOut = $booking['checkout'];
        $bookingStay = $booking['stay_duration'];
        $bookingCost = $booking['price'];
        $bookingStatus = $booking['status'];
        $bookingID = $booking['booking_id'];
    
        $diff_in = calculate_dates(date("Y-m-d"),$bookingIn) ;
        $diff_out = calculate_dates(date("Y-m-d"),$bookingOut) ;
        // $diff = date('Y-m-d') ;

        if($bookingStatus == "Cancelled"){
            $status = "Cancelled";
        }else{
            if($diff_in < 0){
                if($diff_out > -1){
                    $status = "In Progress";
                update_booking($email,$status,$bookingID);
                }else{
                $status = "Complete";
                update_booking($email,$status,$bookingID);
                }
            }else{
                $status = "Upcoming";
            }
        }

?>

<div class="col p-2 mb-4 border rounded bg-light">
    <span class="fw-bold">Name: <?= $fName .' '. $lName ?></span><br>
    <span class="fst-italic fw-semibold">Email: <?= $email?></span><br>
    <span><?=$booked_hotel?></span><br>
    <span><?= $bookingIn ." - ". $bookingOut?></span><br>
    <span>Days booked: <?= $bookingStay?></span><br>
    <span>Cost: <?= $bookingCost?></span><br>
    <span>Status: <?= $status?></span>
<?php if($status == "Upcoming" && $diff_in >2){?>
    <form class="d-grid">
    <a class="btn btn-danger" href="dashboard.php?id=<?= $bookingID ?>">Cancel Booking</a>
    </form>
<?php }?>
</div>

<?php    }
}
?>