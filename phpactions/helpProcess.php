<?php

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Validate and sanitize the customer issue input
    $customer_issue = filter_input(INPUT_GET, 'customer_issue', FILTER_SANITIZE_STRING);

    if (empty($customer_issue)) {
        echo "Invalid input data.";
        exit;
    }

    // Validate that the user is logged in and get the userID from the session
    if (!isset($_SESSION['userID'])) {
        echo "User not logged in.";
        exit;
    }
    $userID = $_SESSION['userID'];

    // Get the current date in the correct format for the database
    $today = date("Y-m-d");

    // Prepare the SQL statement using a prepared statement
    $sql = "INSERT INTO customer_issue (details, userID, date) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        echo "Error in preparing the statement: " . mysqli_error($conn);
        exit;
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "sis", $customer_issue, $userID, $today);
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if ($result) {
        echo "success";
    } else {
        echo "Error in adding the issue: " . mysqli_error($conn);
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
