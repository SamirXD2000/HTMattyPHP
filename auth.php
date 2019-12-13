<?php
session_start();
if (empty($_SESSION['idNutriologo'])) {
    // The username session key does not exist or it's empty.
    header('location: index.php');
    exit;
}

?>