<?php
    include 'head.php';
    session_start();
    if (!isset($_SESSION['fullName'])) {
      header("location:../login.php");
      exit();
    }
    $oldname = explode(' ', $_SESSION['fullName']);
    $firstname = $oldname[0];
    $middlename = $oldname[1];
    $lastname = $oldname[2];
    $address = $_SESSION['address'];
    $contact = $_SESSION['phone'];
    $DOB = $_SESSION['dob'];
    $email = $_SESSION['email'];
    $gender =  $_SESSION['gender']; 
    $img =  $_SESSION['imageUrl'];
 

    
    
?>
<!--css -->

<div class="register-page">
    <span></span>
    <img src="../assets/logo-yellow.png" alt="Hamro Canteen Logo">
<span></span>

    


<!-- login page container -->
<div class = "frm-container"> 

<fieldset>
    <legend>Update Form</legend>

  <form action='serverSideValidation.php' method = 'POST' id="registration-form" name="registrationForm" enctype='multipart/form-data' ">
  <div class = "frm-element">
    <label for="fname">First Name</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo $firstname ?>" >

    <label for="mname">Middle Name</label>    
    <input type="text" id="middle_name" name="middle_name" value="<?php echo $middlename ?>"  >

    <label for="lname">Last Name</label>
    <input type="text" id="last_name" name="last_name"  value="<?php echo $lastname ?>">

    <label for="gender">Gender</label>
    <select id="gender" name="gender"  >
      <option value="">Select</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>

    <label for="dob"> Date of Birth</label>    
    <input type="date" id ="dob" name = "dob" value="<?php echo $DOB ?>">

    <label for="contact"> Contact</label>
    <input type="text" id="contact" name="contact" value="<?php echo $contact ?>">

    <label for="email"> Email</label>   
    <input type="email" id="email" name="email" value="<?php echo $email ?>" >  

    <label for="address"> Address</label>
    <input type="text" id="address" name="address" value="<?php echo $address ?>">
    
    <label for="photo"> Photo</label>
    <input type="file" id="user_image" name="photo" accept=".jpg, .png">
    <span></span>
    <input type="hidden" name = 'update'>
    <input type="submit"  value="Update">
    </div>
    <div class="errorMsg"></div>
  
  </form>

 
  </fieldset>
</div>
<span></span>
</div>





<?php
    include 'layout/foot.php';
?>
