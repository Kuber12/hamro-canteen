<?php
session_start();

// Check if the session variable is set
if (!isset($_SESSION['fullName'])) {
    header("Location: login.php");
    exit();
}

include './layout/head.php';
?>
<link rel="stylesheet" href="./styles/profile.css">
<div class="container" onclick="navigateToPage()">
    <div id="user-profile">
        <div>
            <span id="triangle"></span>
            <h2>Profile <i class="fa-solid fa-rectangle-xmark" id="close" onclick="navigateToPage()"></i></h2>
        </div>
        <img id="profile-img" src="./assets/userImage/<?php echo $_SESSION['imageUrl']; ?>" alt="User Image">
        <div id="info">
            <h3><?php echo $_SESSION['fullName']; ?></h3>
            <h4>Student</h4>
            <h4><span>Email: </span><span><?php echo $_SESSION['email']; ?></span></h4>
            <h4><span>Phone: </span><span><?php echo $_SESSION['phone']; ?></span></h4>
            <h4><span>Address: </span><span><?php echo $_SESSION['address']; ?></span></h4>
            <h4><span>Date of Birth: </span><span><?php echo $_SESSION['dob']; ?></span></h4>
        </div>
        <div id="triangle2"></div>
    </div>
</div>
<script>
    function navigateToPage() {
        window.location.href = "index.php";
    }
</script>
<?php
include './layout/foot.php';
?>
