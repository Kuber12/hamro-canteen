<?php
    include("connection.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form input values
  $firstName = $_POST["first_name"];
  $middleName = $_POST["middle_name"];
  $lastName = $_POST["last_name"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm_password"];
  $gender = $_POST["gender"];
  $address = $_POST["address"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $photo = $_FILES["photo"]["name"];
  $dob = $_POST["dob"];

  // Function to sanitize and block code execution
  function sanitizeInput($input)
  {
    // Remove HTML and PHP tags
    $sanitizedInput = strip_tags($input);

    // Prevent execution of PHP code
    $sanitizedInput = htmlspecialchars($sanitizedInput);

    return $sanitizedInput;
  }

  $errors = array();
  if (empty($firstName)) {
    $errors[] = "First Name is required.";   
  } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $firstName)) {
    $errors[] = "First Name is invalid. It should contain only characters from A-Z and a-z and have a maximum length of 20 characters.";
    
  }

  if (!empty($middleName) && !preg_match("/^[a-zA-Z]{1,20}$/", $middleName)) {
    $errors[] = "Middle Name is invalid. It should contain only characters from A-Z and a-z and have a maximum length of 20 characters.";
    
  }

  if (empty($lastName)) {
    $errors[] = "Last Name is required.";    
  } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $lastName)) {
    $errors[] = "Last Name is invalid. It should contain only characters from A-Z and a-z and have a maximum length of 20 characters.";
    
  }
  // Validate gender
  $allowedGenders = ["male", "female", "others"];
  if (empty($gender)) {
    $errors[] = "Gender is required.";    
  } elseif (!in_array($gender, $allowedGenders)) {
    $errors[] = "Invalid Gender.";
    
  }
  // Validate date of birth
  if (empty($dob)) {
    $errors[] = "Date of Birth is required.";    
  } else {
    $currentDate = date("Y-m-d");
    $age = date_diff(date_create($dob), date_create($currentDate))->y;
    if ($age < 10 || $age > 130) {
      $errors[] = "Invalid Date of Birth. Age must be between 10 and 130 years.";
      
    }
  }
  if (empty($contact)) {
    $errors[] = "Contact is required.";    
  } elseif (!preg_match("/^\d{10}$/", $contact)) {
    $errors[] = "Contact number is invalid. It should contain a maximum of 10 digits.";
    
  }

  // Validate email
  if (empty($email)) {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email is invalid.";
    
  }
  if (empty($address)) {
    $errors[] = "Address is required.";
  } elseif (!preg_match("/^[\w\s.,'-]{1,50}$/", $address)) {
    $errors[] = "Address is invalid. It should only contain 50 character of a letters, numbers, spaces, and hyphens (-).";
  }


  // Validate password and confirm password
  if (empty($password)) {
    $errors[] = "Password is required.";
  }
  if (empty($confirmPassword)) {
      $errors[] = "Confirm Password is required.";        
  }
  if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/", $password)) {
    $errors[] = "Password is invalid. It should contain at least one capital letter, one special character, one number, and have a length between 8 and 12 characters.";
    
  }elseif ($password !== $confirmPassword) {
    $errors[] = "Password and Confirm Password do not match.";
    
  } 
  $allowedExtensions = ["jpg", "jpeg", "png"];
  $photoExtension = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
  if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    $errors[] = "No file selected.";
    
  }elseif (!in_array($photoExtension, $allowedExtensions)) {
    $errors[] = "Invalid photo format. Only JPG, JPEG, and PNG formats are allowed.";
    
  }
  if (!empty($errors)) {
    // foreach ($errors as $key => $value) {
    //   echo $value . "<br>";
    // }
    echo "0";
    exit();
  }
  if (empty($errors)) {
    $firstName = sanitizeInput($firstName);
    $middleName = sanitizeInput($middleName);
    $lastName = sanitizeInput($lastName);
    $password = sanitizeInput($password);
    $gender = sanitizeInput($gender);
    $address = sanitizeInput($address);
    $contact = sanitizeInput($contact);
    $email = sanitizeInput($email);
    $dob = sanitizeInput($dob);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  }
  // common for register and update
  if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $filesize = $_FILES['photo']['size'];
    $filetype = $_FILES['photo']['type'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

  } else {
    echo "Error uploading file.";
  }
  $parts = explode(".", $email);
  $username = $parts[0];
  
 
  $name = $firstName . " " . $middleName . " " . $lastName;
  $full_name =  strtoupper($name);
  
  $userImage = $username. "." . $file_extension;

  $tar_dir = "../assets/userimage/" . $userImage;
  //


  if(isset($_POST['register'])){
    //insert data into database table 'users'

   
      move_uploaded_file($tempname, $tar_dir);

      $sql = "INSERT INTO users(fullName, gender, password, email, phone, DOB , imageUrl, address) VALUES ('$full_name','$gender','$passwordHash','$email',$contact,'$dob','$userImage', '$address')";
      if (mysqli_query($conn, $sql)) {
        echo '<script>
        alert("Registration Successful");
        window.location:../login.php;
        </script>';
      } else {
        echo '<script>
        alert("Registration failed");
        window.location:../login.php;
        </script>';
      }


     } elseif(isset($_POST['update'])){
        // update user details
        $sessionemail = $_SESSION['email'];
        move_uploaded_file($tempname, $tar_dir);
        $sql = "UPDATE USERS SET fullName = '$full_name', gender = '$gender', 
        DOB = '$dob', phone = '$contact', email = '$email', 
        address = '$address', password = '$passwordHash', imageurl = '$userImage' 
        WHERE email = '$sessionemail'";
    
        if (mysqli_query($conn, $sql)) {
          echo '<script>
          alert("Profile Updated Successfully");
          window.location:../profile.php;
          </script>';
        } else {
          echo '<script>
          alert("Profile Update failed");
          window.location:../profile.php;
          </script>';
        }
    }
    
}
mysqli_close($conn);
?>