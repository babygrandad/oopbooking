<?php
require_once('logic/fetchJSON.php');
/*turn this to a function to be reused in the bookstay.php & compare page for
 the right choice options at te top*/
$selected_option = "Columbia Hotel";
foreach (get_hotels() as $hotel) {?>

    <option value="<?= $hotel['name'] ?>"
    <?php if ($selected_option == $hotel['name']) {
        echo ' selected';
    }?>
    ><?= $hotel['name']?></option>
<?php } ?>



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