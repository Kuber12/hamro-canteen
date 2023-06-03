const form = document.getElementById('registration-form');
 
// Get form elements

const firstNameInput = document.getElementById('first_name');
const lastNameInput = document.getElementById('last_name');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('contact');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm_password');
const photoInput = document.getElementById('file');

// Function to validate the form
function validateForm() {
// Retrieve input values
const firstName = firstNameInput.value.trim();
const lastName = lastNameInput.value.trim();
const email = emailInput.value.trim();
const phone = phoneInput.value.trim();
const password = passwordInput.value;
const confirmPassword = confirmPasswordInput.value;
const photo = photoInput.value;

// Regular expressions for validation
const nameRegex = /^[a-zA-Z]+$/;
const emailRegex = /^\S+@\S+\.\S+$/;
const phoneRegex = /^\d{10}$/;

// Resetting previous validation errors
const errorElements = document.getElementsByClassName('error');
while (errorElements.length > 0) {
  errorElements[0].parentNode.removeChild(errorElements[0]);
}

// Validating first name
if (firstName === '') {
  showError(firstNameInput, 'First name is required');
  return false;
} else if (!nameRegex.test(firstName)) {
  showError(firstNameInput, 'First name should only contain letters');
  return false;
}

// Validating last name
if (lastName === '') {
  showError(lastNameInput, 'Last name is required');
  return false;
} else if (!nameRegex.test(lastName)) {
  showError(lastNameInput, 'Last name should only contain letters');
  return false;
}

// Validating email
if (email === '') {
  showError(emailInput, 'Email is required');
  return false;
} else if (!emailRegex.test(email)) {
  showError(emailInput, 'Invalid email format');
  return false;
}

// Validating phone number
if (phone === '') {
  showError(phoneInput, 'Phone number is required');
  return false;
} else if (!phoneRegex.test(phone)) {
  showError(phoneInput, 'Invalid phone number');
  return false;
}

// Validating password
if (password === '') {
  showError(passwordInput, 'Password is required');
  return false;
}

// Validating confirm password
if (confirmPassword === '') {
  showError(confirmPasswordInput, 'Confirm password is required');
  return false;
} else if (password !== confirmPassword) {
  showError(confirmPasswordInput, 'Passwords do not match');
  return false;
}

// Validating photo upload
if (photo === '') {
  showError(photoInput, 'Photo upload is required');
  return false;
}

return true;
}

// Function to display an error message
function showError(inputElement, errorMessage) {
const errorElement = document.createElement('span');
errorElement.className = 'error';
errorElement.innerHTML = errorMessage;
inputElement.parentNode.appendChild(errorElement);
errorElement.style.color='red';
}

// Event listener for form submission
form.addEventListener('submit', function (event) {
if(! validateForm())
  event.preventDefault();
 

});