<?php

function calculate_dates($inDate,$outDate){
    $date1 = new DateTime($inDate);
    $date2 = new DateTime($outDate);
    $interval = $date1->diff($date2);

    $days = $interval->format('%R%a');
    return (int) $days;
}

?>