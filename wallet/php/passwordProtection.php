
<?php

if (isset($_GET['amount'])) {
    $email = $_GET['email'];
    $amount = $_GET['amount'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address');</script>";
        exit;
    }

    if (!is_numeric($amount)) {
        echo "<script>alert('Amount must be a number');</script>";
        exit;
    }

    if ($amount < 0 || $amount > 5000) {
        echo "<script>alert('Amount must be between 0 and 5000');</script>";
        exit;
    }

    echo "<form action='depositeProcess.php' method='POST'>";
    echo "<label for='password'>Enter Your Password</label><br>";
    echo "<input type='password' id='password' name='password' maxlength='12' required>";
    echo "<input type='hidden' name ='amount' value = '$amount'  required>";
    echo "<input type='hidden' name ='email' value = '$email'  required>";
    echo "<input type='submit' id='submit' value='Submit'>";
    echo "</form>";

   
}
?>



