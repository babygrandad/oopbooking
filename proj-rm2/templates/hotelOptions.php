<?php
//same as function above. This one is the function case so use
//it in the final production
require_once('logic/fetchJSON.php');
function hotel_select_options($otherChoice){
    foreach (get_hotels() as $hotel) {?>
        <option value="<?= $hotel['name'] ?>"
        <?php if ($otherChoice == $hotel['name']) {
            echo ' selected';
        }?>
    ><?= $hotel['name']?></option>
 <?php } 
}?>