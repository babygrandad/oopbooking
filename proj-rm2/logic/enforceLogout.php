<?php

//redirect if user is not logged in
session_start();
if (isset($_SESSION['email'])) {
    header('location: dashboard.php');
}

?>