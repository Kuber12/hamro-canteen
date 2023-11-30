<?php
include './layout/head.php';
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
<!--css -->
<link rel="stylesheet" href="./styles/login.css">
<!-- login page container -->
<div class="login-container middle-centered">
    <!-- login form  -->
        <form class="login-form middle-centered-div" >
            <img src="./assets/logo-yellow.png">
    
            <div class="email-div">
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" id="email" placeholder="E-mail" maxLength = "30" required>
            </div>
            <!-- password div -->
            <div class="password-div">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="myPassword" placeholder="password" maxlength ="12" required>
                <!-- value="FakePSW" this can be used to show  fake password -->
                <div id = "show-password" style="display:inline"><i class="fa-solid fa-eye-slash"></i></div> 
                <div id = "hide-password" style="display:none"><i class="fa-solid fa-eye"></i></div> 
            
            
            </div>
            <!-- submit button  -->
            <input type="submit"  value="LOG IN" class="login-btn">
               <br>
            <a href="forgetPassword.php" id="forget-password">Forget Password</a>

        </form>
        <div class="alert-incorrect" id="alert-incorrect">
            <p style="color:red;"><i class="fa-solid fa-triangle-exclamation"></i>Error</p>
            <p style="margin-left:30px;">incorrect Email or password </p>
                     
        </div>
       
</div>


<script src="./scripts/login.js"></script>
<script src="./scripts/jquery.js"></script>
<?php
    include './layout/foot.php';
?>
