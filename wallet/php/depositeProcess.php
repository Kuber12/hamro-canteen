<?php
require('connection.php');

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $adminEmail = $_SESSION['email'];
    $clean_password = htmlspecialchars(strip_tags(trim($password)));

    $sqlquery = "SELECT * FROM admin WHERE email = '$adminEmail'";
    $result = mysqli_query($conn, $sqlquery);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $walletUpdateStmt = $conn->prepare("UPDATE users SET amount = amount + ? WHERE email = ?");
            $walletUpdateStmt->bind_param("ds", $amount, $email);
            $walletUpdateResult = $walletUpdateStmt->execute();

            if (!$walletUpdateResult) {
                // Error occurred during the update
                echo "<script>swal('Error', 'Error while loading money', 'error');</script>";
            } elseif ($walletUpdateStmt->affected_rows === 0) {
                // No rows affected, user not found
                echo "<script>swal('Error', 'Account Not Found', 'error');</script>";
            } else {
                echo "<script>swal('Error', 'Account Not Found', 'error');</script>"; 
            }

            $walletUpdateStmt->close();
            $conn->close();
        } else {
            echo "<script>swal('Error', 'Incorrect Password', 'error');</script>";
        }
    }
}
?>
