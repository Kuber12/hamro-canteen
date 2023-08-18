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
<!--css -->
<link rel="stylesheet" href="./styles/login.css">
<!-- login page container -->
<div class="login-container middle-centered">
    <!-- login form  -->
        <form class="login-form middle-centered-div" action="./phpactions/authentication.php" method = "POST">
            <img src="./assets/logo-yellow.png">
            <!-- username div -->
            <div class="username-div">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username" placeholder="username" required>
            </div>
            <!-- password div -->
            <div class="password-div">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="myPassword" placeholder="password" maxlength ="12" required>
                <!-- value="FakePSW" this can be used to show  fake password -->
                <div id = "show-password" ><i class="fa-solid fa-eye-slash"></i></div> 
                <div id = "hide-password" style="display:none"><i class="fa-solid fa-eye"></i></div> 
            
            
            </div>
            <!-- submit button  -->
            <input type="submit"  value="LOG IN" class="login-btn">
               
            <a href="forgetPassword.php" id="forget-password">Forget Password</a>
            <a href="registerform.php" id="register-link">don't have account? Register</a>
        </form>
        <div class="alert-incorrect" id="alert-incorrect">
            <p style="color:red;"><i class="fa-solid fa-triangle-exclamation"></i>Error</p>
            <p style="margin-left:30px;">incorrect username or password </p>
                     
        </div>
       
</div>

<script src="./scripts/login.js"></script>
<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const msg = urlParams.get('msg');
    if (msg=="incorrect") {
       var div  = document.getElementById("alert-incorrect");
       div.style.display = "block";
       setTimeout(function(){
       div.style.display = "none";
       }, 2000);
    }
</script>
<?php
    include './layout/foot.php';
?>
