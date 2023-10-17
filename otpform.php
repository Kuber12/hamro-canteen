<?php
session_start();
if(!isset($_SESSION['validEmail'])) {
    header("location: login.php");
    exit();
}
unset($_SESSION['validEmail']);
include './layout/head.php';
?>

<style>
    body {

        font-family: 'Nunito Sans', sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.5)),
        url("./assets/login-background.png");
        background-repeat:no-repeat;
        background-size:cover;
    }

    .forgetPassword {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        display: flex;
        justify-content: center;
    }

    #countdown {
        text-align: center;
        height:30px;
    }

    .title {
        text-align: center;
    }
    #otpcontainer{
    
         position:relative;
         left:10%;
         width: 80%;
         
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Optional: Style the input field to make it visually distinct */
    input[type="number"] {
        position:relative;
        padding: 5px;
         border: 1px solid #cccc;
      outline: none;
      width:55%;
               
    }
    input[type="submit"]{
        position:relative;
        width:20%;
        padding: 5.5px;
        border:none;
        background-color: #BD271B;
        color:white;

    
    }
    #Errormsg{
        color:red;
        position: absolute;
    
    }
    label{
        font-size: 16px;
        font-weight: 600;
        width:5%;
    }
   
</style>

<div class='forgetPassword'>
    <form id='otpform'>
        <h3 class='title'>Please type OTP sent in your Email</h3>
        <!-- <h4 id='countdown'></h4> -->
      
        <!-- <div id='otpcontainer'>
         <label for="OTP">OTP : </label> -->
         <input type="number" id="otp" name="otp" placeholder="XXXXXX" oninput="enforceMaxLength()" required />
        <input type='hidden' name='send'>
        <input type="submit" id='send' value="Send">
       
        </div>
       
    </form>
    <div id="Errormsg"></div>
</div>

<script src="./scripts/jquery.js"></script>
<script src="./scripts/forgetPass.js"></script>
<!-- <script>countdown()</script> -->
<?php    
include './layout/foot.php';
?>
