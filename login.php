<?php
    include './layout/head.php';
?>
<div class="login-container middle-centered">
        <form class="login-form middle-centered-div" action="post">
            <img src="./assets/logo-yellow.png">
            <div class="username-div">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username">
            </div>
            <div class="password-div">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="LOG IN">
            <a href="">Forget Password</a>
        </form>
</div>
<?php
    include './layout/foot.php';
?>