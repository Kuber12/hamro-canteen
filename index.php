<?php
session_start();


// Check if the session variable is set
if (!isset($_SESSION['fullName'])) {

    header("location:login.php");
    exit();
}

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
            <i class="fa-solid fa-cart-shopping fa-beat hero-cart" onclick="openCart()"></i>
          
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
                                onclick="closeCart()"></i></span>
                    </div>
                
                </div>               <!-- cart item container -->

                <div class="items" id="items">


                    <!-- item -row -->


                </div>
                <!-- end of  items div-->

                <div class="btn">
                    <button id="back-to-shopping" onclick="closePopup()"><i class="fa-solid fa-arrow-left "
                            style="margin-right:5px;"></i> back
                        to shopping</button>
                        <p>Grand Total</p>
                        <p>=</p>
                        <p id = "gTotal">000</p>
                    <button class="checkout" onclick="checkout()">CHECKOUT</button>
                </div>


                <!-- emd of cart-menu-left -->

                <!-- cart menu right side -->

            </div>
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
                <a onclick ="closeProfile();;openCart();"><i class="fa-solid fa-cart-shopping"></i> My cart <div class="arrow-right"></div></a>
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
            <h2>Sunday's Treats</h2>
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
<?php
include './layout/foot.php';
?>