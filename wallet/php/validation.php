
<?php

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
 
    $amount = $_POST['amount'];
 
    // Validate email, phone, and amount
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        exit;
    }

   

    if (!is_numeric($amount) || $amount <= 0 || $amount > 10000) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid amount.']);
        exit;
    }

    $_SESSION['userEmail'] = $email;
    $_SESSION['depositeAmount'] = $amount;

    header('location:../verifyWalletUser.php');


} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

?>

