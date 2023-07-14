<?php
include("./phpactions/connection.php");

$Date = date("Y-m-d");
$userID = $_SESSION['userID'];
$orderID = 0;
$gtotal = $_SESSION['gtotal'];
$payment = "Cash";
$status = "pending";

$sql0 = "SELECT * FROM orders ORDER BY orderID DESC LIMIT 1";
$result1 = $conn->query($sql0);

if ($result1) {
    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();
        $orderID = $row['orderID'] + 1;
    } else {
        $orderID = 1;
    }
} else {
    echo "Error: " . $sql0 . "<br>" . $conn->error;
    exit();
}

$sql1 = "INSERT INTO orders (orderID, userID, payment, status, orderDate, gtotal) VALUES ('$orderID', '$userID', '$payment', '$status', '$Date', '$gtotal')";

if (mysqli_query($conn, $sql1)) {
    $cart = $_SESSION['cart'];

    foreach ($cart as $item) {
        $foodName = mysqli_real_escape_string($conn, $item['foodName']);
        $qty = mysqli_real_escape_string($conn, $item['quantity']);
        $price = mysqli_real_escape_string($conn, $item['price']);
        $total = $qty * $price;

        $sql2 = "INSERT INTO order_items (orderID, foodName, quantity, price, total) VALUES ('$orderID', '$foodName', '$qty', '$price', '$total')";

        if (mysqli_query($conn, $sql2)) {
            continue;
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            exit();
        }
    }

    unset($_SESSION['cart']);
    mysqli_close($conn);
    header('Location:orders.php');
    exit();
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    exit();
}
?>
