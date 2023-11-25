function validateForm() {
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var amount = document.getElementById('amount').value;

    // Simple email validation
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var isValidEmail = emailPattern.test(email);

    // Phone number validation (numeric and 10 digits)
    var phonePattern = /^\d{10}$/;
    var isValidPhone = phonePattern.test(phone);

    if (!isValidEmail) {
        alert('Please enter a valid email address.');
        return false;
    }

    if (!isValidPhone) {
        alert('Please enter a valid 10-digit phone number.');
        return false;
    }

    if (isNaN(amount) || amount <= 0 || amount > 10000) {
        alert('Please enter a valid amount (greater than 0 and not exceeding 10000).');
        return false;
    }

    return true;
}
