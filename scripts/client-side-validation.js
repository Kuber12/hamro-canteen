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

  if (!passwordPattern.test(password)) {
    showError($('#confirm_password'), 'Please use at least one uppercase letter, symbol, and number');
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
  var formdata = $('#registration-form').serialize(); 


  $.ajax({
    url: './phpactions/duplicateEmailCheck.php',
    type: 'POST',
    data: formdata,
    dataType: 'json',
    success: function(response) {
      if (response === false) {
        showError($('#email'), 'Email already taken');
      }else {
        $("#registration-form")[0].submit(); // Submit the form
      }
      console.log(response);
  }
  });
 
 
});



function showError(inputElement, errorMessage) {
  let errorElement = inputElement.parent().find('.error');

  if (!errorElement.length) {
    errorElement = $('<span class="error"></span>');
    inputElement.parent().append(errorElement);
  }

  errorElement.text(errorMessage);
  errorElement.css({ color: 'red', fontSize: '12px' });
}
