<?php include('templates/header.php'); ?>

<?php
require_once('logic/fetchJSON.php');

foreach (get_hotels() as $hotel) {

    echo '<option value="' . $hotel['name'] . '"';
    if ($selected_option == $hotel['name']) {
        echo ' selected';
    }
    echo '>Option ' . $hotel['name'] . '</option>';
} ?>


// Hold this code 

<?php
require_once('logic/fetchJSON.php');
/*turn this to a function to be reused in the bookstay.php & compare page for
 the right choice options at te top*/
$selected_option = $hotel_name;
foreach (get_hotels() as $hotel) {?>

    <option value="<?= $hotel['name'] ?>"
    <?php if ($selected_option == $hotel['name']) {
        echo ' selected';
    }?>
    ><?= $hotel['name']?></option>
<?php } ?>