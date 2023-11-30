<?php
session_start();
unset($_SESSION['gtotal']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   

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
                    'quantity' => $_POST['productQty'],
                );
            }
        } else {
            $_SESSION['cart'][0] = array(
                'foodID' => $_POST['foodID'],
                'foodName' => $_POST['foodName'],
                'price' => $_POST['price'],
                'imageurl' => $_POST['imageUrl'],
                'quantity' => $_POST['productQty'],
            );
        }
    

    

    // Calculate the total
    $gtotal = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $total = $value['price'] * $value['quantity'];
        $gtotal += $total;
    }

    $_SESSION['gtotal'] = $gtotal;
 
    
    

    
}
?>
