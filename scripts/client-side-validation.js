document.getElementById('registration-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

  // Validation patterns
  var namePattern = /^[a-zA-Z]{1,20}$/;
  var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/;
  var usernamePattern = /^[\w\s.,'-]{1,20}$/;
  var addressPattern = /^[\w\s.,'-]{1,50}$/;
  var phonePattern = /^\d{10}$/;
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var imageExtensions = ['jpg', 'jpeg', 'png'];


  // to get input fields 

  var firstNameI = document.getElementById('first_name');
  var middleNameI = document.getElementById('middle_name');
  var lastNameI = document.getElementById('last_name');
  var userNameI = document.getElementById('username');
  var genderI = document.getElementById('gender');
  var passwordI = document.getElementById('password');
  var confirmPasswordI = document.getElementById('confirm_password');
  var addressI = document.getElementById('address');
  var contactI = document.getElementById('contact');
  var emailI = document.getElementById('email');
  var photoI = document.getElementById('user_image');
  var dobI = document.getElementById('dob');

  // Get form input values
  var firstName = document.getElementById('first_name').value;
  var middleName = document.getElementById('middle_name').value;
  var lastName = document.getElementById('last_name').value;
  var userName = document.getElementById('username').value;
  var gender = document.getElementById('gender').value;
  var password = document.getElementById('password').value;
  var confirmPassword = document.getElementById('confirm_password').value;
  var address = document.getElementById('address').value;
  var contact = document.getElementById('contact').value;
  var email = document.getElementById('email').value;
  var photo = document.getElementById('user_image').value;
  var dob = document.getElementById('dob').value;

  // Validate first name
  if (!namePattern.test(firstName)) {
    showError(firstNameI, 'Please Enter a valid First Name');
    return false;
  }

  // Validate middle name
  if (!namePattern.test(middleName) && middleName.length > 0) {
    showError(middleNameI, 'Please Enter a valid Middle Name');
    return false;
  }

  // Validate last name
  if (!namePattern.test(lastName)) {
    showError(lastNameI, 'Please Enter a valid Last Name');
    return false;
  }
  if (!usernamePattern.test(userName)) {
    showError(userNameI,'Please Enter a valid username');
    return false;
    
  }
  if (gender === '') {
    showError(genderI,'Please Enter Gender');
    return false;    
  }
    // Validate date of birth
    if (dob === '') {
      showError(userNameI,'Please Enter a date of  birth');
      return false;
    }
    var currentDate = new Date();
    var selectedDate = new Date(dob);
    var age = currentDate.getFullYear() - selectedDate.getFullYear();
  
    if (age < 10 || age > 130) {
      showError(userNameI,'Please Enter a valid date of birth 10-130');
      return false;
    }
  if (!phonePattern.test(contact)) {
    showError(contactI,'Please Enter a valid phone number');
    return false;
  }

  // Validate email
  if (!emailPattern.test(email)) {
    showError(emailI,'Please Enter a valid email');
    return false;
  }
  
  // Validate address length
  if (!addressPattern.test(address)) {
    showError(addressI,'Please enter a valid address');
    return false;    
  } 
  if (!passwordPattern.test(password)) {
    showError(confirmPasswordI,'Please use at least one uppercase letter,symbol and number');
    return false;
   }
 
 
  // Validate password and confirm password match
  if (password !== confirmPassword) {
    showError(confirmPasswordI,"Confirm Password doesn't Match");
    return false;
  
  }

  var extension = photo.split('.').pop().toLowerCase();
  if (!imageExtensions.includes(extension)) {
    showError(userNameI,'Please select a valid image file (JPG, JPEG, or PNG).');
    return false;
  }



  alert('Form submitted successfully!');
  document.getElementById('registration-form').submit();
});

function showError(inputElement, errorMessage) {
  let errorElement = inputElement.parentNode.querySelector('.error');

  if (!errorElement) {
    errorElement = document.createElement('span');
    errorElement.className = 'error';
    inputElement.parentNode.appendChild(errorElement);
  }

  errorElement.innerHTML = errorMessage;
  errorElement.style.color = 'red';
  errorElement.style.fontSize = '12px';
}
