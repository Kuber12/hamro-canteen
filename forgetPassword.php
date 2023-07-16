<?php
session_start();
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
    #countdown{
        text-align:center;
    }
    .title{
        text-align: center;
    }

    #otpform, #resetform{
        display:none;
    }
</style>

<div  class = 'forgetPassword'>

<form id= 'emailform' >
<h2 class='title'>Forget Password?</h2>
<label for='email' id ='emaillbl'>Enter your email address:</label>
<input type='email' id ='email' name = 'email'><br>
<input type='hidden'  name = 'submit'>
<button type="submit" id ='submit'>Submit</button>
</form> 

<form id='otpform'>
<h2 class='title'>Please type OPT sent in your Email</h2>
<h3 id ='countdown'></h3>
<input type='number' id ='otp' name= 'otp'><br>
<input type='hidden' name= 'send'>
<button type="submit"  id='send' >Send</button>
</form>

<form id='resetform' >
<h2 class='title'>Enter Your New Password</h2>
<label for="password">Password</label><br>
<input type="password" id = 'password' name = 'password'><br>
<label for="password">Confirm-Password</label><br>
<input type="password" id = 'cPassword' name = 'cPassword'><br>
<input type="hidden" name='reset'>
<button type ='submit'  id ='reset' >Reset</button><br>
</form>

</div>
<script src="./scripts/jquery.js"> </script>
<!-- <script src="./scripts/client-side-validation.js"> </script> -->
<script>
 $('#emailform').on('submit', function(event) {
    var countdownInterval; // Global variable to store the interval

    event.preventDefault(); // Prevent default form submission behavior
    var formData = $(this).serialize();

    $.ajax({
        url: './phpactions/forgetPasswordProcess.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
         
            if (response == true) {
                email = document.getElementById('email').value;
                
                clearInterval(countdownInterval); // Clear previous interval
                document.getElementById('otpform').style.display=  "block";
                document.getElementById('emailform').style.display=  "none";
                
                var count = 59; // Set the initial countdown value

                countdownInterval = setInterval(function() {
                    document.getElementById("countdown").textContent = count + " seconds remaining";
                    count--;

                    if (count < 0) {
                        clearInterval(countdownInterval);
                        document.getElementById("countdown").textContent = "Time Over!";
                    }
                }, 1000);
            } else {
                alert('Email does not exist');
            }
        }
    });
});


 $('#otpform').on('submit', function(event){
            event.preventDefault();
            formData = $(this).serialize();
            $.ajax({
                url: './phpactions/forgetPasswordProcess.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success:function(response){
                    if(response===true){
                        document.getElementById('otpform').style.display=  "none";
                         document.getElementById('resetform').style.display=  "block";
                        
                    }
                    else if(response===0){
                        alert('timeout');
                    }else{
                        alert('incorrect OTP');
                    }
                       
                }
                });            
        });

 $('#resetform').on('submit', function(event){
           
            event.preventDefault();
            var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/;

            var passwordI = document.getElementById('password');
            var confirmPasswordI = document.getElementById('cPassword');

            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('cPassword').value;

            if (!passwordPattern.test(password)) {
            showError(confirmPasswordI,'Please use at least one uppercase letter,<br>symbol and number');
                return false;
              }
 
 
                // Validate password and confirm password match
                 if (password !== confirmPassword) {
                showError(confirmPasswordI,"Confirm Password doesn't Match");
                return false;
  
  }
            function showError(inputElement, errorMessage) {
           let errorElement = inputElement.parentNode.querySelector('.error');

         if (!errorElement) {
            errorElement = document.createElement('span');
            errorElement.className = 'error';
            inputElement.parentNode.appendChild(errorElement);
    }

            errorElement.innerHTML = errorMessage;
            errorElement.style.color = 'red';
            errorElement.style.fontSize = '14px';
}


            formData = $(this).serialize();
            $.ajax({
                url: './phpactions/forgetPasswordProcess.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success:function(response){
                    if(response===true){
                       alert('Password Updated successfully');
                       window.location='login.php';                      
                        
                    }else if(response===false){
                        alert('password update failed');                 
                       
                    }else if(response === 0){
                        alert("please Enter a valid password");
                    }
              }    
              });            
        });
    </script>
<?php    
    include './layout/foot.php';
?>