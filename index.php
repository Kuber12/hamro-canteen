<?php
session_start();


// Check if the session variable is set
if (!isset($_SESSION['fullName'])) {
    
    header("location:login.php");
    exit();
}

$day = date("l"); 
// $day = "Friday";

if (isset($_SESSION['today']) && $_SESSION['today'] !== $day) {
    // Unset the cart session variable
    unset($_SESSION['cart']);
  }  
  // Store the current date in the session
  $_SESSION['today'] = $day;
  
include './layout/head.php';

?>

<nav>

    <div class="link_container">
        <a href="index.php">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Blog</a>
    </div>

    <div class="search_bar">
        <form action="#">
            <input type="text" placeholder="Search.." name="search" />
            <button type="submit" i><i class="fa fa-search"></i></button>
        </form>
    </div>



</nav>
<div class="hero middle-centered">

    <div class="hero-items">
        <!-- logo container -->
        <span>
            <img src="./assets/logo-yellow.png " class="hero-logo">
        </span>

        <!-- cart and user icon container -->
        <span>
        <span id="user-cart-holder">
            <span id = "noOfItems" class="noOfItems">       

            </span>
            <i class="fa-solid fa-cart-shopping fa-beat hero-cart" id ="cart" onclick="openCart()"></i>
          
            <img src="./assets/userImage/<?php echo $_SESSION['imageUrl']?>" alt="Profile Picture"
            class="hero-profile" id="hero-profile-button" onclick="openProfile()">
            </span>
         
            <!-- cart menu starts here -->
            <div class="cart-menu" id="cart-menu">
                <!-- cart header -->
                <div>
                    <div class="cart-header">
                        <h2><i class="fa-sharp fa-solid fa-cart-shopping" style="margin-right:10px;"></i>My Cart</h2>
                        <span><i class="fa-solid fa-circle-xmark fa-2xl" style="color: #000000;"
                                onclick="closePopup()"></i></span>
                    </div>
                
                </div>               <!-- cart item container -->

                <div class="items empty" id="items">


                    <!-- item -row -->


                </div>
                <!-- end of  items div-->

                <div class="btn">
                    <button id="back-to-shopping" onclick="closeCart()"><i class="fa-solid fa-arrow-left "
                            style="margin-right:5px;"></i> back to shopping</button>
                        <p>Grand Total</p>
                        <p>=</p>
                        <p id = "gTotal"></p>
                    <button id="checkout" onclick="paymentOption()" disabled> CHECKOUT</button>
                </div>
              
        

            </div>
            <div id ="payment_option"></div>

            <!-- end of cart menu -->

            <!-- popup profile menu starts here -->

            <div class="profile-menu" id="profile-menu">
                <div class="profile-info-container">
                    <img src="./assets/userImage/<?php echo $_SESSION['imageUrl']?>" alt="Profile Picture">
                    <p>
                        <?php echo $_SESSION['fullName'] ?>
                   
                    <p>

                </div>
                <a href="profile.php"><i class="fa-solid fa-circle-user"></i> My Profile <div class="arrow-right"></div></a>
                <a href="orders.php"><i class="fa-solid fa-cart-shopping"></i> My Orders <div class="arrow-right"></div></a>
                <a href="help.php"><i class="fa-solid fa-circle-question"></i> Help <div class="arrow-right"></div> </a>
                <a href="logout.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i>Sign Out <div></div></a>

            </div>
            <!-- end of profile menu -->
        </span>
        <!-- end of cart, user-icon, cart-menu, profile-menu -->
    </div>

    <h1 class="hero-heading middle-centered-div">Hamro Canteen</h1>
    <!-- marqueee tag  -->
    <div class="marquee">
        <marquee behavior="alternate" direction="left" width="100%">
            <h2><?php echo $day ?>'s Treats</h2>
        </marquee>
    </div>
</div>
<!-- end of hero middle-centered -->

<div id="menu">
    <h3>Today's Menu</h3>

</div>

<!-- available item /product -->

<div class="menu-display" id="menu-display" onload="displayProduct()">

    <!-- menu menu-display continue ends in foot.php -->


    <!-- product details appears here -->



</div>


<script src="./scripts/index.js"></script>
<script src="./scripts/cart.js"></script>
<script src="./scripts/cart-manager.js"></script>
<script src="./scripts/jquery.js"> </script>


<script>
$(document).ready(function() {

$('.productfrm').on('submit',function(event) {
  // Prevent the form from submitting normally
  event.preventDefault();

  // Get the form data
  var formData = $(this).serialize();
 
  // Send the data via AJAX
  $.ajax({
    type: 'POST',
    url: './phpactions/cartManager.php',
    data: formData,
    dataType:'json',


  success: function(response) {
   alert(response);
   $('#noOfItems').html(`${response.value1.length}`);
   totalItem = response.value1.length;
  if(totalItem==0|| totalItem==null|| totalItem==undefined || totalItem ==" "){
 
    $('.noOfItems').css('display', 'none');
   }
   else{

    $('.noOfItems').css('display', 'block');
   }  

  
}});


}); 
});

</script>

<?php
include './layout/foot.php';
?>
 