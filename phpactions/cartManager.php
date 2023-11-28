<?php
session_start();
unset($_SESSION['gtotal']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate and sanitize user input if required

    if (isset($_POST['add-to-cart'])) {
        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            $matchFound = false;
            foreach ($_SESSION['cart'] as $k => $value) {
                if ($value['foodName'] === $_POST['foodName']) {
                    $_SESSION['cart'][$k]['quantity'] += $_POST['productQty'];
                    $matchFound = true;
                    break;
                }
            }
            if (!$matchFound) {
                $_SESSION['cart'][$count] = array(
                    'foodID' => $_POST['foodID'],
                    'foodName' => $_POST['foodName'],
                    'price' => $_POST['price'],
                    'imageurl' => $_POST['imageUrl'],
                    'quantity' => $_POST['productQty']
                );
            }
        } else {
            $_SESSION['cart'][0] = array(
                'foodID' => $_POST['foodID'],
                'foodName' => $_POST['foodName'],
                'price' => $_POST['price'],
                'imageurl' => $_POST['imageUrl'],
                'quantity' => $_POST['productQty']
            );
        }
    }

    if (isset($_POST['remove-item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['foodName'] === $_POST['foodName']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break; // Exit the loop after removing the item
            }
        }
    }

    // Calculate the total
    $gtotal = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $total = $value['price'] * $value['quantity'];
        $gtotal += $total;
    }

    $_SESSION['gtotal'] = $gtotal;
    
    if (isset($_POST['getCount'])) {
        // If the client requests the count, only return the count
        $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
        echo json_encode(["count" => $count]);
        return;
    }

    // Prepare details array
    if (isset($_SESSION['cart'])) {
        $details = array(
            "value1" => $_SESSION['cart'],
            "value2" => $gtotal,
        );
    } 
    
    // Encode and return details
    $json_encoded = json_encode($details);

    if ($json_encoded === false) {
        // Handle JSON encoding error
        echo json_last_error_msg();
    } else {
        echo $json_encoded;
    }
}
?>
