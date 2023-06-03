<?php



// Function to validate the registration form
function validateRegistrationForm($formData) {
  $errors = array();

  // Validate first name
  if (empty($formData['first_name'])) {
    $errors[] = 'First name is required.';
  }

  // Validate last name
  if (empty($formData['last_name'])) {
    $errors[] = 'Last name is required.';
  }

  // Validate username
  if (empty($formData['username'])) {
    $errors[] = 'Username is required.';
  }

  // Validate email
  if (empty($formData['email'])) {
    $errors[] = 'Email is required.';
  } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format.';
  }

  // Validate phone number
  if (empty($formData['contact'])) {
    $errors[] = 'Phone number is required.';
  }


  // Validate date of birth
  if (empty($formData['dob'])) {
    $errors[] = 'Date of birth is required.';
  } else {
    // Perform additional validation if needed
  }

  // Validate address
  if (empty($formData['address'])) {
    $errors[] = 'Address is required.';
  }

  // Validate password and confirm password
  if (empty($formData['password'])) {
    $errors[] = 'Password is required.';
  }
       else if (strlen($formData['password']) < 8) {
        // Password is too short
             $errors[] = 'Password is too short.';
        }
       else if (strlen($formData['password']) > 12) {                     
        // Password is too long
             $errors[] = 'Password is too long.';
        }
        else if (preg_match('/[a-z]/', $formData['password']) < 1) {                        
            $errors[] = 'Password must contain at least one lowercase letter.';
        }
        else if (preg_match('/[A-Z]/', $formData['password']) < 1){                                
            $errors[] = 'Password must contain at least one uppercase letter.';
        }
        else if (preg_match('/[0-9]/', $formData['password']) < 1) {
             $errors[] = 'Password must contain at least one number.';  
        }                                 
        else if (preg_match('/[\W]/', $formData['password']) < 1) {
    
            $errors[] = 'Password must contain at least one special character.';
        }
    
       elseif ($formData['password'] !== $formData['confirm_password']) {
       $errors[] = 'Passwords do not match.';
    

       }
  
    
  // Validate gender
  if (empty($formData['gender'])) {
    $errors[] = 'Gender is required.';
    }
    // Validate profile picture
    if (empty($formData['photo'])) {
        $errors[] = 'Profile picture is required.';
      
        }


  return $errors;
}


// Handle POST request for registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $formErrors = validateRegistrationForm($_POST);

  if (empty($formErrors)) {
    include("connection.php");
  
   $full_name = $_POST['first_name'] ." " . $_POST['middle_name'] ." " . $_POST['last_name'] ;
   $user_name = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $gender = $_POST['gender'];
   $img = $_POST['photo'];

$dob = $_POST['dob'];

   $phone_number = $_POST['contact'];
   $address = $_POST['address'];
  


   $sql = "INSERT INTO users(username, fullName, gender, password, email, phone, DOB , imageUrl, address) VALUES ('$user_name','$full_name','$gender','$password','$email',$phone_number,'$dob','$img', '$address')";
   //INSERT INTO `users`(`userID`, `username`, `fullName`, `gender`, `password`, `email`, `phone`, `DOB`, `imageUrl`, `address`)
   if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
  else {
    foreach($formErrors as  $key => $value){
        echo $value . "<br>";
    }
  }
}
  
?>