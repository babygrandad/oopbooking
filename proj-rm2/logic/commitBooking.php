<?php
function commit_booking($email,$hotel_name,$checkin,$checkout,$stayDuration,$price){
    require_once('logic/fetchJSON.php');
    $array = array();
    $bookings = get_bookings();
    if (is_array($bookings)) {
      $array = $bookings;
    } else {
      echo "get_bookings() did not return an array, returned value: " . print_r($bookings, true);
    }
    $newBooking = (object) [
      "email" => $email,
      "hotel_name" => $hotel_name,
      "checkin" => $checkin,
      "checkout" => $checkout,
      "stay_duration" => $stayDuration,
      "price" => $price,
      "status" => "Upcoming",
      "booking_id" => randomizer()
    ];
    array_push($array, $newBooking);
    // Encode the array back into a JSON string
    $json = json_encode($array);
    // Write the JSON string back to the file
    file_put_contents("json/bookings.json", $json, JSON_PRETTY_PRINT);
  }

  function randomizer(){
    $randomNumber = '';
    for ($i = 0; $i < 10; $i++) {
      $randomNumber .= mt_rand(0, 9);
    }
    return $randomNumber;
  }

?>
