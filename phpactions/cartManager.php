    <?php
    session_start();        

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        if (isset($_POST['add-to-cart'])) {
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                $matchFound = false; // Flag variable to track if a match was found
                foreach ($_SESSION['cart'] as $k => $val) {
                    if ($val['foodName'] == $_POST['foodName']) {
                        $_SESSION['cart'][$k]['quantity'] += $_POST['productQty'];
                        $matchFound = true; // Set the flag to indicate a match was found
                        break; // Exit the loop since a match was found
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
                //  $remove = $_POST['foodName'];
                if ($value['foodName'] ==$_POST['foodName']) {
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




