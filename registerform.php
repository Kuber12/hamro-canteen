<?php
    include './layout/head.php';
    session_start();
    if (isset($_SESSION['fullName'])) {
      header("location:index.php");
      exit();
    }
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

  <form action="./phpactions/serverSideValidation.php"  id="registration-form" name="registrationForm" method="POST" enctype='multipart/form-data' ">
  <div class = "frm-element">
    <label for="fname">First Name</label>
    <input type="text" id="first_name" name="first_name" >

    <label for="mname">Middle Name</label>    
    <input type="text" id="middle_name" name="middle_name"  >

    <label for="lname">Last Name</label>
    <input type="text" id="last_name" name="last_name" >

    <label for="gender">Gender</label>
    <select id="gender" name="gender" >
      <option value="">Select</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>

    <label for="dob"> Date of Birth</label>    
    <input type="date" id ="dob" name = "dob"/>

    <label for="contact"> Contact</label>
    <input type="text" id="contact" name="contact">

    <label for="email"> Email</label>   
    <input type="email" id="email" name="email"  >  

    <label for="address"> Address</label>
    <input type="text" id="address" name="address" >

    <label for="password"> Password</label>
    <input type="password" id="password" name="password"  >

    <label for="confirm_password"> Confirm Password</label> 
    <input type="password" id="confirm_password" name="confirm_password" >
    
    <label for="photo"> Photo</label>
    <input type="file" id="user_image" name="photo" accept=".jpg, .png" >
    <span></span>
    <input type="hidden" name = 'submit-btn'>
    <input type="submit"  value="Register">
    </div>
    <div class="errorMsg"></div>
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
