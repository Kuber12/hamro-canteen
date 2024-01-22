<?php
require("connection.php");

$Date = date("Y-m-d");
$userID = $_SESSION['userID'];
$orderID = 0;
$gtotal = $_SESSION['gtotal'];
$payment = "Mero Wallet";
$status = "paid";
$email = $_SESSION['email'
];


// Get the next orderID
$sql0 = "SELECT MAX(orderID) as maxOrderID FROM orders";
$result1 = $conn->query($sql0);

if ($result1) {
    $row = $result1->fetch_assoc();
    $orderID = $row['maxOrderID'] + 1;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error getting orderID: ' . $conn->error]);
    exit();
}

// Check if there's enough balance in the wallet
$sqlBalanceCheck = "SELECT amount FROM users WHERE email = ?";
$balanceCheckStmt = $conn->prepare($sqlBalanceCheck);
$balanceCheckStmt->bind_param("s", $email);
$balanceCheckStmt->execute();
$balanceCheckStmt->bind_result($currentAmount);
$balanceCheckStmt->fetch();
$balanceCheckStmt->close(); // Close the statement here

if ($currentAmount < $gtotal) {
    // Insufficient balance
    echo json_encode(['status' => 'error', 'message' => 'Not enough balance in the wallet.']);
    exit();
}

// Update 'amount' for the user in the 'wallet' table
$walletUpdateStmt = $conn->prepare("UPDATE users SET amount = amount - ? WHERE email = ?");
$walletUpdateStmt->bind_param("ds", $gtotal, $email);
$walletUpdateResult = $walletUpdateStmt->execute();

if (!$walletUpdateResult) {
    // Error occurred during the update
    echo json_encode(['status' => 'error', 'message' => 'Error updating wallet: ' . $walletUpdateStmt->error]);
    exit();
} elseif ($walletUpdateStmt->affected_rows === 0) {
    // No rows affected, user not found
    echo json_encode(['status' => 'error', 'message' => 'Could not find your account in wallet']);
    exit();
}

// Insert into orders table
$sql1 = "INSERT INTO orders (orderID, userID, payment, status, gtotal, orderedTime) VALUES (?, ?, ?, ?, ?, NOW())";
$orderStmt = $conn->prepare($sql1);
$orderStmt->bind_param("isssd", $orderID, $userID, $payment, $status, $gtotal);

if (!$orderStmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'Error inserting into orders: ' . $orderStmt->error]);
    exit();
}

// Insert into order_items table
$cart = $_SESSION['cart'];
foreach ($cart as $item) {
    $foodName = mysqli_real_escape_string($conn, $item['foodName']);
    $qty = mysqli_real_escape_string($conn, $item['quantity']);
    $price = mysqli_real_escape_string($conn, $item['price']);
    $total = $qty * $price;

    $sql2 = "INSERT INTO order_items (orderID, foodName, quantity, price, total) VALUES (?, ?, ?, ?, ?)";
    $orderItemsStmt = $conn->prepare($sql2);
    $orderItemsStmt->bind_param("issdd", $orderID, $foodName, $qty, $price, $total);

    if (!$orderItemsStmt->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Error inserting into order_items: ' . $orderItemsStmt->error]);
        exit();
    }
}

// Cleanup and redirect
$orderStmt->close();
$orderItemsStmt->close();
unset($_SESSION['cart']);
mysqli_close($conn);
header('Location: ../../orders/orders.php');
exit();
?>
