<?php

//redirect if user is not logged in
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

?>