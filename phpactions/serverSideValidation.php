<?php
// Assuming you have a PHP server and a registration form with fields: first_name, last_name, middle_name, username, contact, email, address, password, confirm_password

// Validate the form data upon form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    // Validate form data
    
    $errors = [];

  

    // Validate form data
    if (empty($first_name) || empty($last_name) || empty($middle_name) || empty($username) || empty($contact) || empty($email) || empty($address) || empty($password) || empty($confirm_password)) {
        // Form data is incomplete
        $error = 'Please fill in all the fields.';
        } else if ($password != $confirm_password) {
            // Passwords do not match
            $error = 'Passwords do not match.';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Email is not valid
                $error = 'Email is not valid.';
                } else if (strlen($password) < 6) {
                    // Password is too short
                    $error = 'Password is too short.';
                    } else if (strlen($password) > 20) {
                        // Password is too long
                        $error = 'Password is too long.';
                        } else if (preg_match('/[a-z]/', $password) < 1) {
                            // Password must contain at least one lowercase letter
                            $error = 'Password must contain at least one lowercase letter.';
                            } else if (preg_match('/[A-Z]/', $password) < 1) {
                                // Password must contain at least one uppercase letter
                                $error = 'Password must contain at least one uppercase letter.';
                                } else if (preg_match('/[0-9]/', $password) < 1) {
                                    // Password must contain at least one number
                                    $error = 'Password must contain at least one number.';
                                    } else if (preg_match('/[\W]/', $password) < 1) {
                                        // Password must contain at least one special character
                                        $error = 'Password must contain at least one special character.';
                                        } else {
                                            // Password is valid
                                            $error = '';
                                            }
                                            }
                                            
?>