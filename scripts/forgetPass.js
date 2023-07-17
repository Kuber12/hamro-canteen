 // for Reset Form
 function countdown() {
    var seconds = 59;
    var timer = setInterval(function() {
     $('#countdown').text(seconds);
      seconds--;
      if (seconds < 0) {
        clearInterval(timer);
        console.log("Countdown complete!");
      }
    }, 1000);
  }
  


$('#emailform').on('submit', function(event) {
  event.preventDefault(); // Prevent default form submission behavior
 // Global variable to store the interval
  var formData = $(this).serialize();
 $('#submit').prop('disabled', true);
  // Show loading message
  $('#Errormsg').text("Loading.....");

  $.ajax({
    url: './phpmailer/send.php',
    type: 'POST',
    data: formData,
    dataType: 'json',
    success: function(response) {

      if (response === true) {
        countdown();
        window.location= "otpform.php";
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
        $('#Errormsg').text("Incorrect OTP!" );
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
        fontSize: '14px'
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
      }
    }
  });
});   

