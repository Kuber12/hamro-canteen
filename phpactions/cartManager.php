<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    if (isset($_POST['add-to-cart'])) {
    

       

        if (isset($_SESSION['cart'])) {

            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('foodName' => $_POST['foodName'], 'price' => $_POST['price'], 'imageurl' => $_POST['imageUrl'], 'quantity' => $_POST['productQty']);
          


        } else {
            $_SESSION['cart'][0] = array('foodName' => $_POST['foodName'], 'price' => $_POST['price'], 'imageurl' => $_POST['imageUrl'], 'quantity' => $_POST['productQty']);
        }
    }

    if (isset($_POST['remove-item'])) {  
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['foodName'] == $_POST['foodName']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);


            }
        }
    }
    $gtotal = 0;
$total = 0;
foreach ($_SESSION['cart'] as $key => $value) {
    $total = $value['price'] * $value['quantity'];
      
    $gtotal += $total;


    }     
    $details = array(
        "value1" => $_SESSION['cart'],
        "value2" => $gtotal,     
       
      );

    echo json_encode($details);


}






// print_r($_SESSION['cart']);