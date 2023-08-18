<?php
// include("./connection.php");

// if (isset($_POST['userID'], $_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['gender'], $_FILES['photo'], $_POST['dob'], $_POST['contact'], $_POST['address'])) {
//     $userID = $_POST['userID'];
//     $full_name = $_POST['first_name'] . " " . $_POST['middle_name'] . " " . $_POST['last_name'];
//     $user_name = $_POST['username'];
//     $email = $_POST['email'];
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Use a stronger password hashing algorithm
//     $gender = $_POST['gender'];
//     $img = $_FILES['photo']['name'];
//     $dob = $_POST['dob'];
//     $phone_number = $_POST['contact'];
//     $address = $_POST['address'];

//     // Validate and sanitize the input data
//     $user_name = mysqli_real_escape_string($conn, $user_name);
//     $email = mysqli_real_escape_string($conn, $email);
//     $img = mysqli_real_escape_string($conn, $img);
//     $address = mysqli_real_escape_string($conn, $address);

//     // Check if the username already exists (optional, if you have a unique constraint on the column)
//     $sql = "SELECT * FROM users WHERE username = '$user_name'";
//     $result = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         echo "Username already exists.";
//         exit;
//     }

//     $file_extension = pathinfo($img, PATHINFO_EXTENSION);
//     $userImage = $user_name . "." . $file_extension;
//     $tar_dir = "../assets/userimage/" . $userImage;

//     // Process the uploaded file
//     if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
//         if (!move_uploaded_file($_FILES['photo']['tmp_name'], $tar_dir)) {
//             echo "Error uploading file.";
//             exit;
//         }
//     } else {
//         echo "Error uploading file.";
//         exit;
//     }

//     $sql = "INSERT INTO users (username, fullName, gender, password, email, phone, DOB, imageUrl, address) VALUES ('$user_name', '$full_name', '$gender', '$password', '$email', $phone_number, '$dob', '$userImage', '$address')";
//     if (mysqli_query($conn, $sql)) {
//         echo "Record updated successfully.";
//         header("location:../menuitem.php");
//     } else {
//         echo "Error updating record: " . mysqli_error($conn);
//     }
// } else {
//     echo "Incomplete data.";
// }
?>
