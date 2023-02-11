<?php
include_once('logic/fetchJSON.php');

$hotelSet = hotel_choices("Seek Safari", "Gazella Guest House" );
function hotel_choices($hotel1, $hotel2) {
    
    $hotelSet = ["", ""];
    foreach (get_hotels() as $hotel) {
        if ($hotel['name'] === $hotel1) {
            $hotelSet[0] = $hotel;
        }
        if ($hotel['name'] === $hotel2) {
            $hotelSet[1] = $hotel;
        }
    }
    return $hotelSet;
}

foreach ($hotelSet[0]['features'] as $featureName => $hotel1Feature) {
  $hotel2Feature = $hotelSet[1]['features'][$featureName];

    $lChoice = null;
    $rChoice = null;

    $green_check = "<i class='text-success fa-solid fa-circle-check fa-lg'></i>";
    $red_cross = "<i class='text-danger fa-sharp fa-solid fa-circle-xmark fa-lg'></i>";

    if(is_bool($hotel1Feature) && $hotel1Feature === true){
        $lChoice = $green_check;
    }else if(is_bool($hotel1Feature) && $hotel1Feature === false){
        $lChoice = $red_cross;
    }else{
        $lChoice = $hotel1Feature;
    };

    if(is_bool($hotel2Feature) && $hotel2Feature === true){
        $rChoice = $green_check;
    }else if(is_bool($hotel2Feature) && $hotel2Feature === false){
        $rChoice = $red_cross;
    }else{
        $rChoice = $hotel2Feature;
    };


    // if($hotel1Feature === true){
    //     $lChoice = $green_check;
    // }else{
    //     $lChoice = $red_cross;
    // };

    // if($hotel2Feature === true){
    //     $rChoice = $green_check;
    // }else{
    //     $rChoice = $red_cross;
    // };

  echo '<div class="row container-fluid m-auto">
      <div class="col-4 border table-rows">
          <span>' . $lChoice . '</span>
      </div>
      <div class="col-4 border table-rows">
          <span>' . $featureName . '</span>
      </div>
      <div class="col-4 border table-rows">
          <span>' . $rChoice . '</span>
      </div>
  </div>';
}
?>

<div class="row container-fluid m-auto">
      <div class="col-4 border table-rows">
          <span><?php //echo(($hotelSet[0]['features']['price'] * $stayDuration))?></span>
      </div>
      <div class="col-4 border table-rows">
          <span>Cost</span>
      </div>
      <div class="col-4 border table-rows">
          <span><?php //echo(($hotelSet[1]['features']['price'] * $stayDuration))?></span>
      </div>
  </div>
