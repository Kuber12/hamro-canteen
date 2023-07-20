<?php
session_start();
// if(!isset($_SESSION['validOTP'])) {
//     header('location:login.php');
//     exit();
// }
    include './layout/head.php';
?>
<style>
    body{
        font-family: 'Nunito Sans', sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.5)),
        url("./assets/login-background.png");
        background-repeat:no-repeat;
        background-size:cover;
    }
    .forgetPassword{
        position: absolute;  
        top: 50%;
        left: 50%;      
        transform: translate(-50%,-50%);
        background-color: white;
        padding:20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
 
    .title{
        text-align: center;
    }
    input{
        margin-top:5px;
        display: block;
   
    }
    input[type="submit"]{
           padding: 5.5px;
        border:none;
        background-color: #BD271B;
        color:white;
    
    }
    .error{
        font-size: 16px;
    }


</style>

<div  class = 'forgetPassword'>


<form id='resetform' action='./phpactions/forgetPasswordProcess.php' method ='POST' >
<h2 class='title'>Enter Your New Password</h2>
<label for="password">Password</label>
<input type="password" id = 'password' name = 'password' required>
<label for="password">Confirm-Password</label>
<input type="password" id = 'cPassword' name = 'cPassword' required>
<input type="hidden" name='reset'>
<input type ='submit'  id ='reset' value='Reset'>
</form>
<div id="Errormsg"></div>
</div>
<script src="./scripts/jquery.js"> </script>
<script src="./scripts/forgetPass.js"> </script>

<?php    
    include './layout/foot.php';
?>