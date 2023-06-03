<?php
    include './layout/head.php';
?>
<!--css -->
<link rel="stylesheet" href="./styles/register.css">
<div class="register-page">
    <span></span>
    <img src="./assets/logo-yellow.png" alt="Hamro Canteen Logo">
<span></span>

    


<!-- login page container -->
<div class = "frm-container"> 

<fieldset>
    <legend>Registration Form</legend>

  <form action="./phpactions/serverSideValidation.php"  id="registration-form" name="registrationForm" method="POST">
  <div class = "frm-element">
    <input type="text" id="first_name" name="first_name" placeholder = "First Name" >

    <input type="text" id="last_name" name="last_name" placeholder="Last Name" >
    
    <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name" >

    <input type="text" id="username" name="username" placeholder="User Name" >

    <select id="gender" name="gender" >
      <option value="">Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>

    
    <input type="text" id="contact" name="contact" placeholder="Phone" >

    
   
    <input type="email" id="email" name="email" placeholder="Email" >
    
    <input type="date" id ="dob" name = "dob" />

    <input type="text" id="address" name="address" placeholder="Address" ></input>

    <input type="password" id="password" name="password" placeholder="Password" >
 
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" >

    <input type="file" id="photo" name="photo" accept=".jpg, .png" >
    <input type="submit"  value="Register">
    <!-- <input type="submit" value="Login"> -->
    </div>
    <a href="login.php" class="redirect-to-login" >already have an account? Login</a>
  </form>

 
  </fieldset>
</div>
<span></span>
</div>


<script src="./scripts/client-side-validation.js"></script>


<?php
    include './layout/foot.php';
?>
