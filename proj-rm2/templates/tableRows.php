<?php
include_once('logic/fetchJSON.php');

$hotelSet = hotel_choices($hotel_name, $secondChoice );
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

$hotel_daily_rate = $hotelSet[0]['features']['daily_rate'];
$price = $hotel_daily_rate * $stayDuration;
$_SESSION['price'] = $price;
?>

<!-- you need to add in the $stayDuration variable before making the 
echo statements in the span tags active  -->
<div class="row container-fluid m-auto">
      <div class="col-4 border table-rows">
          <span><?php echo($price)?></span>
      </div>
      <div class="col-4 border table-rows">
          <span>Cost</span>
      </div>
      <div class="col-4 border table-rows">
          <span><?php echo(($hotelSet[1]['features']['daily_rate'] * $stayDuration))?></span>
      </div>
  </div>
