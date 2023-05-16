<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pid = $_POST['productId'];
    if(isset($_POST[`add-to-cart$pid`])) {
        if(isset($_SESSION['cart'])){

            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('foodName' => $_POST['foodName'], 'price' => $_POST['price'], 'imageurl' => $_POST['imageUrl'], 'quantity' => $_POST['productQty']);
            print_r($_SESSION['cart']);
        
        }
        else {
            $_SESSION['cart'][0] = array('foodName' => $_POST['foodName'], 'price' => $_POST['price'], 'imageurl' => $_POST['imageUrl'], 'quantity' => $_POST['productQty']);
            print_r($_SESSION['cart']);
        }
    }
    if(isset($_POST['remove-item'])){
        foreach($_SESSION['cart'] as $key  => $value){
            if($value['foodName'] == $_POST['foodName']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
    }
}


