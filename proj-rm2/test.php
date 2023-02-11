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