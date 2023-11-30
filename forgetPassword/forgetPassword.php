<?php
session_start();
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

    #submit:disabled {
  cursor: not-allowed;
  position: relative;
}
input[type="submit"]{
        padding: 6.9px;
        border:none;
        background-color: #BD271B;
        color:white;
        
    }
input[type="email"]{
        padding: 5px;
          width:300px;
        
    }

#submit:disabled::after {
  content: "please wait while sending an email";
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  background-color: #333;
  color: #fff;
  padding: 5px;
  font-size: 14px;
  border-radius: 4px;
  white-space: nowrap;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.3s ease;
}

#submit:disabled:hover::after {
  visibility: visible;
  opacity: 1;
}
#Errormsg{
  color:red;
  font-weight: 600;
}


</style>

<div  class = 'forgetPassword'>

<form id= 'emailform'>
<h2 class='title'>Forget Password?</h2>
<label for='email' id ='emaillbl'>Enter your email address:</label><br>
<input type='email' id ='email' name = 'email' required>
<input type='hidden'  name = 'submit'>

<input  type="submit" id ='submit' value='Submit'>
</form> 

<div id="Errormsg"></div>
</div>
<script src="./scripts/jquery.js"> </script>
<script src="./scripts/forgetPass.js"> </script>

<?php    
    include './layout/foot.php';
?>