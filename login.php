<?php
include './layout/head.php';
session_start();
if (isset($_SESSION['adminName'])) {
  header("location:dashboard.php");
  exit();
}
if (isset($_SESSION['fullName'])) {
  header("location:index.php");
  exit();
}
?>

<!-- CSS -->
<link rel="stylesheet" href="./styles/login.css">

<!-- Login page container -->
<div class="login-container middle-centered">
    <!-- Login form -->
    <form class="login-form middle-centered-div" action="./phpactions/authentication.php" method="POST">
        <img src="./assets/logo-yellow.png" alt="Logo">
        <!-- Username div -->
        <div class="username-div">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <!-- Password div -->
        <div class="password-div">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="myPassword" placeholder="Password" maxlength="12" required>
            <div id="show-password" style="display: inline;"><i class="fa-solid fa-eye-slash"></i></div>
            <div id="hide-password" style="display: none;"><i class="fa-solid fa-eye"></i></div>
        </div>
        <!-- Submit button -->
        <input type="submit" value="LOG IN" class="login-btn">
        <a href="forgetPassword.php" id="forget-password">Forgot Password</a>
        <a href="registerform.php" id="register-link">Don't have an account? Register</a>
    </form>
    <div class="alert-incorrect" id="alert-incorrect">
        <p class="error-message"><i class="fa-solid fa-triangle-exclamation"></i>Error</p>
        <p class="error-description">Incorrect username or password</p>
    </div>
</div>

<script src="./scripts/login.js"></script>
<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const msg = urlParams.get('msg');
    if (msg == "incorrect") {
        var div = document.getElementById("alert-incorrect");
        div.style.display = "block";
        setTimeout(function () {
            div.style.display = "none";
        }, 2000);
    }
</script>

<?php
include './layout/foot.php';
?>
