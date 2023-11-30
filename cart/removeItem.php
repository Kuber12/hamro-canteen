<?php
session_start();
foreach ($_SESSION['cart'] as $key => $value) {
    if ($value['foodName'] === $_POST['foodName']) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        break; // Exit the loop after removing the item
    }
}
echo json_encode($_SESSION['cart']);
?>

