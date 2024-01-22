<?php
session_start();
if(!isset($_SESSION['fullName'])){

    header('location:login.php');
    exit();

}

?>