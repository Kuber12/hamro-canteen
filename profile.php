<?php
session_start();


// Check if the session variable is set
if (!isset($_SESSION['fullName'])) {

    header("location:login.php");
    exit();
}

include './layout/head.php';

?>
<link rel="stylesheet" href="./styles/profile.css">

<div id = "user-profile">
    <div>
    <span id="traingle"></span>
<h2>Profile <i class="fa-solid fa-rectangle-xmark" id="close"></i></h2>

</div>

    <img src="./assets/userImage/avatar.jpg" alt="User Image">

   <div id="info">

  <h3> <?php echo $_SESSION['fullName'] ?></h3>
  <h4>Student</h4>
  <p>Email: <?php echo $_SESSION['fullName'] ?></p>
  <p>Phone: <?php echo $_SESSION['phone'] ?></p>
  <p>Address: <?php echo $_SESSION['address'] ?></p>
    
</div>
<div id="triangle2"></div>


</div>

<?php 
include './layout/foot.php'; ?>

