<?php
// Function to sanitize input
function sanitizeInput($input)
{
    return htmlspecialchars(strip_tags($input));
}

include("../phpactions/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form input values
    $firstName = sanitizeInput($_POST["first_name"]);
    $middleName = sanitizeInput($_POST["middle_name"]);
    $lastName = sanitizeInput($_POST["last_name"]);
    $gender = sanitizeInput($_POST["gender"]);
    $address = sanitizeInput($_POST["address"]);
    $contact = sanitizeInput($_POST["contact"]);
    $email = sanitizeInput($_POST["email"]);
    $photo = $_FILES["photo"]["name"];
    $dob = sanitizeInput($_POST["dob"]);

    // Initialize variables
    $userImage = "";
    $full_name = strtoupper($firstName . " " . $middleName . " " . $lastName);

    // Function to validate name
    function validateName($name, $fieldName)
    {
        global $errors;
        if (empty($name)) {
            $errors[] = "$fieldName is required.";
        } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $name)) {
            $errors[] = "$fieldName is invalid. It should contain only characters from A-Z and a-z and have a maximum length of 20 characters.";
        }
    }

    // ... (other validation functions)

    // Validate and sanitize input
    validateName($firstName, "First Name");
    validateName($middleName, "Middle Name");
    // ... (validate other fields)

    // Handle file upload
    $allowedExtensions = ["jpg", "jpeg", "png"];
    $photoExtension = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
    $parts = explode(".", $email);
    $username = $parts[0];
    

    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        if (!in_array($photoExtension, $allowedExtensions)) {
            $errors[] = "Invalid photo format. Only JPG, JPEG, and PNG formats are allowed.";
        } else {
            // Move uploaded file and set $userImage
            $userImage = $username . "." . $photoExtension;
            move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/userimage/$userImage");
        }
    } else {
        $errors[] = "No file selected.";
    }

    // Check for validation errors
    if (!empty($errors)) {
        echo 'Please enter valid details';
        exit();
    }

    // Update user details
    $sessionemail = $_SESSION['email'];
    $sql = "UPDATE users SET fullName = '$full_name', gender = '$gender', 
        DOB = '$dob', phone = '$contact', email = '$email', 
        address = '$address',  imageurl = '$userImage' 
        WHERE email = '$sessionemail'";

    if (mysqli_query($conn, $sql)) {
        // Update session variables
        $_SESSION['fullName'] = $full_name;
        $_SESSION['imageUrl'] = $userImage;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $contact;
        $_SESSION['address'] = $address;
        $_SESSION['dob'] = $dob;
        $_SESSION['gender'] = $gender;

        echo "Profile updated";
    } else {
        header('Location: profile.php');
        exit;
    }
}

mysqli_close($conn);
?>
