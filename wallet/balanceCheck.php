<?php

require("./php/connection.php");
require("./php/userVerification.php");


// Assuming you have received the email from a form or another source
$email = $_POST['email'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT amount FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

// Bind the result variable
$stmt->bind_result($amount);

// Fetch the result
if ($stmt->fetch()) {
    echo json_encode($amount);
} else {
    echo json_encode(['status' => 'error', 'message' => 'User not found or no deposits for the specified email.']);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
