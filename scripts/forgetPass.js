 // for Reset Form
 function countdown() {
  const urlParams = new URLSearchParams(window.location.search);
  const expireTimeParam = urlParams.get('expiretime');
  const expireDate = new Date(decodeURIComponent(expireTimeParam));
  const currentTime = new Date().getTime();
  const difference = expireDate.getTime() - currentTime;
  if(difference < 0){
    alert("Time over");
    window.location = 'forgetPassword.php';
  }else{
  let minutes = Math.floor(difference / (1000 * 60));
  let seconds = Math.floor((difference / 1000) % 60);
  
  var timer = setInterval(function() {
      $('#countdown').text("Timer : " + minutes + " : " + seconds);
    seconds--;
    
    if (seconds < 0) {
      minutes--;
      seconds = 59;
    }
    
    if (minutes === 0 && seconds === 0) {
      $('#countdown').text("Timer : " + minutes + " : " + seconds);
     var result;
      setTimeout(function() {
       let result = confirm("Time Over! Do you want to resend");
        if (result) {
          window.location='forgetPassword.php';
        }
        else{
         window.location = 'login.php';
        }
      }, 1000);
      
      clearInterval(timer); // Stop the timer
    }
  }, 1000);
}
 }  
  


$('#emailform').on('submit', function(event) {
  event.preventDefault(); // Prevent default form submission behavior
 // Global variable to store the interval
  var formData = $(this).serialize();
 $('#submit').prop('disabled', true);
  // Show loading message
  $('#Errormsg').text("Sending email please wait.....");

  $.ajax({
    url: './phpmailer/send.php',
    type: 'POST',
    data: formData,
    dataType: 'json',
    success: function(response) {

      if (response === true) {
        countdown();
        const date = new Date();
        date.setMinutes(date.getMinutes() + 2);
        console.log(date);
        const formattedDate = encodeURIComponent(date.toISOString());
        window.location = `otpform.php?expiretime=${formattedDate}`;
        $('#submit').prop('disabled', false);

      } else if (response === false) {
        $('#Errormsg').text("Email Doesn't exists!");
        $('#submit').prop('disabled', false);
      } else {
        $('#Errormsg').text("Error while sending mail");
        $('#submit').prop('disabled', false);
      }
    },
    error: function(xhr, status, error) {
      
      console.log(error);
     
      $('#submit').prop('disabled', false);
    }
 
    
    
  });
});
//

// Function to enforce a maximum length of 6 digits
function enforceMaxLength() {
  var input = document.getElementById("otp");
  if (input.value.length > 6) {
    input.value = input.value.slice(0, 6);
  }
}
//to submit oTP

$('#otpform').on('submit', function(event) {
  event.preventDefault();
  var formData = $(this).serialize();

  $.ajax({
    url: './phpactions/forgetPasswordProcess.php',
    type: 'POST',
    data: formData,
    dataType: 'json',
    success: function(response) {
      if (response === true) {
            window.location = 'passwordReset.php';
      } else if (response === 0) {
        $('#Errormsg').text("Time out");
      } else {
        alert("Incorrect OTP");
      }
    }
  });
});

// for Reset Form

$('#resetform').on('submit', function(event) {
  event.preventDefault();
  var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/;

  var passwordI = $('#password');
  var confirmPasswordI = $('#cPassword');

  var password = $('#password').val();
  var confirmPassword = $('#cPassword').val();

  if (!passwordPattern.test(password)) {
    showError(confirmPasswordI, 'Please use at least one uppercase letter,<br>symbol and number');
    return false;
  }

  // Validate password and confirm password match
  if (password !== confirmPassword) {
    showError(confirmPasswordI, "Confirm Password doesn't Match");
    return false;
  }

  function showError(inputElement, errorMessage) {
    let errorElement = inputElement.parent().find('.error');

    if (!errorElement.length) {
      errorElement = $('<span>').addClass('error');
      inputElement.parent().append(errorElement);
    }

    errorElement.html(errorMessage)
      .css({
        color: 'red',
        fontSize: '16px',
      
      });
  }

  var formData = $(this).serialize();
  $.ajax({
    url: './phpactions/forgetPasswordProcess.php',
    type: 'POST',
    data: formData,
    dataType: 'json',
    success: function(response) {
      if (response === true) {
        alert('Password Updated successfully');
        window.location = 'login.php';
      } else if (response === false) {
        alert('Password update failed');
      } else if (response === 0) {
        alert('Please enter a valid password');
      }else if (response === 1) {
        alert('Session Expired');
        window.location = 'login.php';
      }
    }
  });
});   

