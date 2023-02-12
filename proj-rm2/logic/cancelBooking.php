<?php
require('updateJSON.php');
require_once('fetchJSON.php');
require_once('sessionLogic.php');


if (isset($_GET['id'])) {
    update_booking($email,"Cancelled",$_GET['id']);
    header('location: ../dashboard.php');
}


?>