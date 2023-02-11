<?php
    session_start(); 
    $stay = $_POST['val'];
    $_SESSION['stayDuration'] = $stay;
    echo $stay;
?>