$("#registration-form").submit(function(event) {
  event.preventDefault();

  function showError(inputElement, errorMessage) {
    $('.errorMsg').text(errorMessage);
    return false;
  }

  function validatePattern(value, pattern, errorMessage) {
    if (!pattern.test(value)) {
      showError($(inputElement), errorMessage);
    }
  }

  var namePattern = /^[a-zA-Z]{1,20}$/;
  var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/;
  var addressPattern = /^[\w\s.,'-]{1,50}$/;
  var phonePattern = /^\d{10}$/;
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var imageExtensions = ['jpg', 'jpeg', 'png'];

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

  validatePattern(firstName, namePattern, 'Please enter a valid First Name');
  validatePattern(middleName, namePattern, 'Please enter a valid Middle Name');
  validatePattern(lastName, namePattern, 'Please enter a valid Last Name');

  if (gender === '') {
    showError($('#gender'), 'Please select a Gender');
  }

  if (dob === '') {
    showError($('#dob'), 'Please enter a date of birth');
  } else {
    var currentDate = new Date();
    var selectedDate = new Date(dob);
    var age = currentDate.getFullYear() - selectedDate.getFullYear();
    if (age < 10 || age > 130) {
      showError($('#dob'), 'Please enter a valid date of birth (10-130 years)');
    }
  }

  validatePattern(contact, phonePattern, 'Please enter a valid phone number');
  validatePattern(email, emailPattern, 'Please enter a valid email');
  validatePattern(address, addressPattern, 'Please enter a valid address');

  if (password === '') {
    showError($('#password'), 'Password is required');
  }

  if (password !== confirmPassword) {
    showError($('#confirm_password'), "Confirm Password doesn't match");
  }

  var extension = photo.split('.').pop().toLowerCase();
  if (!imageExtensions.includes(extension)) {
    showError($('#user_image'), 'Please select a valid image file (JPG, JPEG, or PNG)');
  }
 
      $("#registration-form")[0].submit();
    
  
});
