<?php
session_start();
    include './layout/head.php';
?>
<style>
    body{
        background-color: white;
    }
    #forgetPassword{
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
    #title{
        text-align: center;
    }
    #send, #password, #Cpassword, #reset{
        display :none;
    }
</style>

<div  id = 'forgetPassword'>
<h2 id='title'>Forget Password?</h2>

<h3 id ='countdown'></h3>
<form id= 'forgetPass' >
<label for='email' id ='emaillbl'>Enter your email address:</label>
<input type='email' id ='email' name = 'email'><br>
<button type ='submit' name = 'submit' id ='submit' onclick ='startCountdown(event)'>Submit</button>
<button type ='submit' name = 'send' id ='send'  onclick='submitForm(event)'>Send</button>
<input type="password" id = 'password' name = 'password'>
<input type="password" id = 'Cpassword' name = 'Cpassword'>
<button type ='submit' name = 'submit' id ='reset' >Reset</button>
</form>
</div>
<script>
        var countdownInterval; // Global variable to store the interval
        
        function startCountdown(event) {
            event.preventDefault();

            $.ajax({
                url:'./phpactions/forgotpasswordProcess.php',
                method: 'POST',
                dataType: 'json',
                success:function(response){
                    if (response=='1'){
                    email = document.getElementById('email').value;
                    document.getElementById('title').innerHTML = 'Please Enter OTP Sent in your mail';
                      document.getElementById('emaillbl').innerHTML = '';
                     document.getElementById('submit').style.display = 'none';
                     document.getElementById('send').style.display = 'block';
                    document.getElementById('email').type = 'number';

            clearInterval(countdownInterval); // Clear previous interval
            
            var count = 59; // Set the initial countdown value
            
            countdownInterval = setInterval(function() {
                document.getElementById("countdown").textContent = count + " seconds remaining";
                count--;
                
                if (count < 0) {
                    clearInterval(countdownInterval);
                    document.getElementById("countdown").textContent = "Countdown complete!";
                }
            }, 1000);
        }
        else{
            alert('email does not exits');
        }
                }
            })
         
        }
        function submitForm(event){
            event.preventDefault();
            $.ajax({
                url:'./phpactions/forgotpasswordProcess.php',
                method: 'POST',
                dataType: 'json',
                success:function(response){
                        document.getElementById('password').style.display = 'block';
                        document.getElementById('reset').style.display = 'block';
                        document.getElementById('email').style.display = 'none';
                        document.getElementById('submit').style.display = 'none';
                        document.getElementById('done').style.display = 'none';
                }
                });

            
        }
    </script>
<?php    
    include './layout/foot.php';
?>