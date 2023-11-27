<?php

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_SESSION['userEmail'];
    $amount = $_SESSION['depositeAmount'];

        $walletUpdateStmt = $conn->prepare("UPDATE users SET amount = amount + ? WHERE email = ?");
        $walletUpdateStmt->bind_param("ds", $amount, $email);
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
    
    
    // Unset the correct session variable
    unset($_SESSION['depositeAmount']);
}

?>
