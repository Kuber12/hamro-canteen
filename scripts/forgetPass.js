 // for Reset Form
 function countdown() {
    const urlParams = new URLSearchParams(window.location.search);
    let expireDate = new Date(urlParams.get('expiretime'));
    let difference = expireDate.getTime() - new Date().getTime();

// Calculate the minutes and seconds
let minutes = Math.floor(difference / (1000 * 60));
let seconds = Math.floor((difference / 1000) % 60);
    // var seconds = 59;
    var timer = setInterval(function() {
     $('#countdown').text(minutes + " : " + seconds);
      seconds--;
      if(minutes == 0 && seconds == 0 ){
        console.log("count down complete");
        return false;
      }
      if(seconds < 0 ){
        minutes--;
        seconds = 59;
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
        const date = new Date();
        date.setMinutes(date.getMinutes() + 5);
        console.log(date);
        window.location= `otpform.php?expiretime=${date}`;
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

