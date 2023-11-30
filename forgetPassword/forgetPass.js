

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
      
        window.location = 'otpform.php';
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
        window.location.href = 'passwordReset.php';
      } else if (response === 0) {
       alert("timeout");
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
 
  $('#resetform')[0].submit();
});   

