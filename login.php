<?php
include './layout/head.php';
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
        <div id="temp">
            <div class="d-flex flex-column justify-content-center w-100 h-100">

            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 class="fw-light text-white m-0">Welcome to Hamro canteen</h1>
            </div>
            </div>
        </div>
        <style>
            #temp{
                color:white;
                font-size:40px;
                position: fixed;
                background:black;
                padding:30vh 13vw;
                width:100ww;  
                z-index: 2;
                text-align: center;
                opacity: 1;
                transition: transform 0.8s cubic-bezier(0.52, 0.16, 0.24, 0.93), opacity 0.8s ease;
            }
            #temp {
                background: linear-gradient(-45deg, var(--alternate-color), var(--secondary-color), var(--bright-green));
                background-size: 300% 300%;
                animation: gradient 15s ease infinite;
                height: 100vh;
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

        </style>
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
    let temp =  document.getElementById("temp");
    temp.addEventListener("click",function(){
        temp.style.transform = "translateY(-100%)";
        temp.style.opacity = "0";
    });

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
