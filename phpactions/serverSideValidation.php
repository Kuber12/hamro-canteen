<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form input values
  $firstName = $_POST["first_name"];
  $middleName = $_POST["middle_name"];
  $lastName = $_POST["last_name"];
  $username = $_POST["username"];
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
  if (empty($username)) {
    $errors[] = "username required";     
  } elseif (!preg_match("/^[\w\s.,'-]{1,20}$/", $username)) {
    $errors[] = "Username is invalid. It should only contain 50 character of a letters, numbers, spaces, and hyphens (-).";
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
    foreach ($errors as $key => $value) {
      echo $value . "<br>";
    }
  }
  if (empty($errors)) {
    $firstName = sanitizeInput($firstName);
    $middleName = sanitizeInput($middleName);
    $lastName = sanitizeInput($lastName);
    $userName = sanitizeInput($username);
    $password = sanitizeInput($password);
    $gender = sanitizeInput($gender);
    $address = sanitizeInput($address);
    $contact = sanitizeInput($contact);
    $email = sanitizeInput($email);
    $dob = sanitizeInput($dob);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    include("connection.php");


    $sqlquery = "SELECT * FROM users where username = '$userName'";
    $result = mysqli_query($conn, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
      echo "<br>username already taken<br>";
      echo "<br><a href='../registerform.php' style='text-decoration:none; border: 1px solid black;padding:5px;
    background-color:red; color:white;'>back to registration page</a><br>";

    } else {
      if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $filename = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        $filesize = $_FILES['photo']['size'];
        $filetype = $_FILES['photo']['type'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

      } else {
        echo "Error uploading file.";
      }

      // $userID = $_REQUEST["userID"];
      $full_name = $_POST['first_name'] . " " . $_POST['middle_name'] . " " . $_POST['last_name'];
      $sql = "SELECT * FROM users where username = '$userName'";

      $result = mysqli_query($conn, $sql);
      $userImage = $userName . "." . $file_extension;

      $tar_dir = "../assets/userimage/" . $userImage;
      move_uploaded_file($tempname, $tar_dir);

      $sql = "INSERT INTO users(username, fullName, gender, password, email, phone, DOB , imageUrl, address) VALUES ('$userName','$full_name','$gender','$passwordHash','$email',$contact,'$dob','$userImage', '$address')";
      if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully.<br>";
        echo "<br><a href='../login.php' style='text-decoration:none; border: 1px solid black;padding:5px;
      background-color:red; color:white;'>back to login Page</a><br>";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
        echo "<br><a href='../registerform.php' style='text-decoration:none; border: 1px solid black;padding:5px;
      background-color:red; color:white;'>back to registration page</a><br>";
      }


    }
    mysqli_close($conn);
  }
  echo "<br><a href='../login.php' style='text-decoration:none; border: 1px solid black;padding:5px;
  background-color:red; color:white;'>Go to registration page</a><br>";
}

?>