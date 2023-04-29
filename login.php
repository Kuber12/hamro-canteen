<?php

    include './layout/head.php';
?>
<!--css -->
<link rel="stylesheet" href="./styles/login.css">
<!-- login page container -->
<div class="login-container middle-centered">
    <!-- login form  -->
        <form class="login-form middle-centered-div" action="connection.php" method = "POST">
            <img src="./assets/logo-yellow.png">
            <!-- username div -->
            <div class="username-div">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username" placeholder="username">
            </div>
            <!-- password div -->
            <div class="password-div">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="myPassword" placeholder="password" maxlength ="12" >
                <!-- value="FakePSW" this can be used to show  fake password -->
                <div id = "show-password" style="display:inline"><i class="fa-solid fa-eye-slash"></i></div> 
                <div id = "hide-password" style="display:none"><i class="fa-solid fa-eye"></i></div> 
            
            
            </div>
            <!-- submit button  -->
            <input type="submit" value="LOG IN" class="login-btn">
               
            <a href="#" id="forget-password">Forget Password</a>.
        </form>
</div>

<script src="./scripts/login.js"></script>

<?php
    include './layout/foot.php';
?>
