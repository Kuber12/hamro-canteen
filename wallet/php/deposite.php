<?php

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_SESSION['userEmail'];
    $phone = $_SESSION['userPhone'];
    $amount = $_SESSION['depositeAmount'];

    // Check if email and phone exist in 'users' table
    $userCheckStmt = $conn->prepare("SELECT email, phone FROM users WHERE email = ? AND phone = ?");
    $userCheckStmt->bind_param("ss", $email, $phone);
    $userCheckStmt->execute();
    $userCheckStmt->store_result();

    if ($userCheckStmt->num_rows > 0) {
        // User exists, proceed to add money to the 'amount' column in 'wallet' table

        // Update 'amount' for the user in the 'wallet' table
        $walletUpdateStmt = $conn->prepare("UPDATE wallet SET amount = amount + ? WHERE email = ? AND phone = ?");
        $walletUpdateStmt->bind_param("dss", $amount, $email, $phone);
        $walletUpdateResult = $walletUpdateStmt->execute();

        if (!$walletUpdateResult) {
            // Error occurred during the update
            echo json_encode('Error updating wallet: ');
        } elseif ($walletUpdateStmt->affected_rows === 0) {
            // No rows affected, user not found
            echo json_encode('Could not find your account in wallet');
        } else {
            // Update successful
            echo json_encode("success");
        }

        $walletUpdateStmt->close();
        $conn->close();
    } else {
        // User does not exist
        echo json_encode('User does not exist.');
    }
    
    // Unset the correct session variable
    unset($_SESSION['depositeAmount']);
}

?>
