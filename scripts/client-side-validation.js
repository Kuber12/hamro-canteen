$("#registration-form").submit(function(event) {
  event.preventDefault(); // Prevent form submission

  // Validation patterns
  var namePattern = /^[a-zA-Z]{1,20}$/;
  var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/;
  var addressPattern = /^[\w\s.,'-]{1,50}$/;
  var phonePattern = /^\d{10}$/;
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var imageExtensions = ['jpg', 'jpeg', 'png'];

  // Get form input values
  var firstName = $('#first_name').val();
  var middleName = $('#middle_name').val();
  var lastName = $('#last_name').val();
  var gender = $('#gender').val();
  var password = $('#password').val();
  var confirmPassword = $('#confirm_password').val();
  var address = $('#address').val();
  var contact = $('#contact').val();
  var email = $('#email').val();
  var photo = $('#user_image').val();
  var dob = $('#dob').val();

  // Validate first name
  if (!namePattern.test(firstName)) {
    showError($('#first_name'), 'Please enter a valid First Name');
    return false;
  }

  // Validate middle name
  if (!namePattern.test(middleName) && middleName.length > 0) {
    showError($('#middle_name'), 'Please enter a valid Middle Name');
    return false;
  }

  // Validate last name
  if (!namePattern.test(lastName)) {
    showError($('#last_name'), 'Please enter a valid Last Name');
    return false;
  }

  if (gender === '') {
    showError($('#gender'), 'Please select a Gender');
    return false;
  }

  // Validate date of birth
  if (dob === '') {
    showError($('#dob'), 'Please enter a date of birth');
    return false;
  }
  var currentDate = new Date();
  var selectedDate = new Date(dob);
  var age = currentDate.getFullYear() - selectedDate.getFullYear();

  if (age < 10 || age > 130) {
    showError($('#dob'), 'Please enter a valid date of birth (10-130 years)');
    return false;
  }

  if (!phonePattern.test(contact)) {
    showError($('#contact'), 'Please enter a valid phone number');
    return false;
  }

  // Validate email
  if (!emailPattern.test(email)) {
    showError($('#email'), 'Please enter a valid email');
    return false;
  }

  // Validate address length
  if (!addressPattern.test(address)) {
    showError($('#address'), 'Please enter a valid address');
    return false;
    }

// Validating password
if (password === '') {
  showError(passwordInput, 'Password is required');
  return false;
}

  // Validate password and confirm password match
  if (password !== confirmPassword) {
    showError($('#confirm_password'), "Confirm Password doesn't match");
    return false;
  }

  var extension = photo.split('.').pop().toLowerCase();
  if (!imageExtensions.includes(extension)) {
    showError($('#user_image'), 'Please select a valid image file (JPG, JPEG, or PNG)');
    return false;
  }
  duplicateCheck(function(isValid) {
    if (isValid) {
      $("#registration-form")[0].submit();
    }
  
  });
}else{
  $("#registration-form")[0].submit();
}
});



function showError(inputElement, errorMessage) {
  
  $('.errorMsg').text(errorMessage);

}
function duplicateCheck(callback) {
  var email = $('#email').val();
  $.ajax({
    url: './phpactions/duplicateEmailCheck.php',
    method: 'POST',
    data: { email: email },
    dataType: 'json',
    success: function(response) {
      if (response === true) {
        $('.errorMsg').text('Email already taken');
        callback(false);
      } else if (response===false){
        callback(true);
      }
    },
    error: function() {
      callback(false);
    }
  });
}


