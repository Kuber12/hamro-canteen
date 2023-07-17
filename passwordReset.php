<?php
session_start();
if(!isset($_SESSION['validOTP'])) {
    header('location:login.php');
    exit();
}
    include './layout/head.php';
?>
<style>
    body{
        background-color: white;
        font-family: 'Nunito Sans', sans-serif;
    }
    .forgetPassword{
        position: absolute;
        height:300px;  
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


</style>

<div  class = 'forgetPassword'>


<form id='resetform' >
<h2 class='title'>Enter Your New Password</h2>
<label for="password">Password</label><br>
<input type="password" id = 'password' name = 'password'><br>
<label for="password">Confirm-Password</label><br>
<input type="password" id = 'cPassword' name = 'cPassword'><br>
<input type="hidden" name='reset'>
<button type ='submit'  id ='reset' >Reset</button><br>
</form>
<div id="Errormsg"></div>
</div>
<script src="./scripts/jquery.js"> </script>
<script src="./scripts/forgetPass.js"> </script>

<?php    
    include './layout/foot.php';
?>