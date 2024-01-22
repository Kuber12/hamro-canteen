<?php 

session_start();

if (isset($_SESSION['adminName'])) {
  header("location:./admin/index.php");
  exit();
}

if (isset($_SESSION['fullName'])) {
  header("location:index.php");
  exit();
}

?>