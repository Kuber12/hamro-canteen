<?php
session_start();
if(!isset($_SESSION['email'])) {
    header("location: login.php");
    exit();
}
include './layout/head.php';
?>

<style>
    body {
        background-color: white;
        font-family: 'Nunito Sans', sans-serif;
    }

    .forgetPassword {
        position: absolute;
        height: 300px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    #countdown {
        text-align: center;
    }

    .title {
        text-align: center;
    }
</style>

<div class='forgetPassword'>
    <form id='otpform'>
        <h2 class='title'>Please type OTP sent in your Email</h2>
        <h3 id='countdown'></h3>
        <input type='number' id='otp' name='otp'><br>
        <input type='hidden' name='send'>
        <button type="submit" id='send'>Send</button>
    </form>
    <div id="Errormsg"></div>
</div>

<script src="./scripts/jquery.js"></script>
<script src="./scripts/forgetPass.js"></script>
<script>countdown()</script>
<?php    
include './layout/foot.php';
?>
