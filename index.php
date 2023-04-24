<?php
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
<form action="#" >
    <input type="text" placeholder="Search.." name="search" />
    <button type="submit" i><i class="fa fa-search"></i></button>
</form>
</div>



</nav>
<div class="hero middle-centered">

    <div class="hero-items">
        <!-- logo container -->
        <span>
            <img src="./assets/logo-white.png " class="hero-logo">
        </span>

        <!-- cart and user icon container -->
        <span>
            <i class="fa-solid fa-cart-shopping fa-beat hero-cart" id="hero-cart-button"></i>
            <i class="fa-solid fa-user hero-profile" id="hero-profile-button"></i>
            <!-- cart menu starts here -->
            <div class="cart-menu" id="cart-menu">

                <!-- left part of cart menu -->
                <div class="cart-menu-left">
                    <!-- cart header -->
                    <div class="cart-header">
                        <h2><i class="fa-sharp fa-solid fa-cart-shopping" style="margin-right:10px;"></i>My Cart</h2>
                    </div>

                    <!-- cart item container -->

                    <div class="items">
                        <!-- item -row -->
                        <div class="item-row">
                            <input type="checkbox" checked />
                            <img src="./assets/burger.jpg" alt="burger">
                            <p>MOMO</p>
                            <p>Rs. 120</p>
                            <p>X</p>
                            <!-- quantity specifier -->
                            <span class="qty">
                                <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                                <input type="number" value="1">
                                <i class="fa-solid fa-square-plus fa-lg"></i>
                            </span>
                            <!-- delete item from the cart -->
                            <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;"></i>
                        </div>

                        <div class="item-row">
                            <input type="checkbox" checked />
                            <img src="./assets/burger.jpg" alt="burger">
                            <p>Chana Anda</p>
                            <p>Rs. 120</p>
                            <p>X</p>
                            <span class="qty">
                                <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                                <input type="number" value="1">
                                <i class="fa-solid fa-square-plus fa-lg"></i>
                            </span>
                            <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;"></i>
                        </div>

                        <div class="item-row">
                            <input type="checkbox" checked />
                            <img src="./assets/burger.jpg" alt="burger">
                            <p>MOMO</p>
                            <p>Rs. 120</p>
                            <p>X</p>
                            <span class="qty">
                                <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                                <input type="number" value="1">
                                <i class="fa-solid fa-square-plus fa-lg"></i>
                            </span>
                            <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;"></i>
                        </div>
                        <div class="item-row">
                            <input type="checkbox" checked />
                            <img src="./assets/burger.jpg" alt="burger">
                            <p>MOMO</p>
                            <p>Rs. 120</p>
                            <p>X</p>
                            <span class="qty">
                                <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                                <input type="number" value="1">
                                <i class="fa-solid fa-square-plus fa-lg"></i>
                            </span>
                            <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;"></i>
                        </div>
                        <div class="item-row">
                            <input type="checkbox" checked />
                            <img src="./assets/burger.jpg" alt="burger">
                            <p>MOMO</p>
                            <p>Rs. 120</p>
                            <p>X</p>
                            <span class="qty">
                                <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                                <input type="number" value="1">
                                <i class="fa-solid fa-square-plus fa-lg"></i>
                            </span>
                            <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;"></i>
                        </div>

                    </div>
                    <!-- end of  items div-->

                    <button id="back-to-shopping"><i class="fa-solid fa-arrow-left " style="margin-right:5px;"></i> back
                        to shopping</button>

                </div>
                <!-- emd of cart-menu-left -->

                <!-- cart menu right side -->
                <div class="cart-menu-right">
                    <span><i class="fa-solid fa-circle-xmark fa-2xl" style="color: #000000;" id="close"></i></span>
                    <h2>Summary</h2>
                    <div class="summary">
                        <p> <span> 1. </span> <span> MOMO </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p> <span> 1. </span> <span> MOMO </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p> <span> 1. </span> <span> MOMO </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p> <span> 1. </span> <span> MOMO </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p> <span> 1. </span> <span> MOMO </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p> <span> 1. </span> <span> Chana Anda </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p> <span> 1. </span> <span> MOMO </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p> <span> 1. </span> <span> MOMO </span> <span> X 2 </span> <span> = 240 </span></p>
                        <p><span style="margin-left:20px;">TOTAL </span> <span> = 720 </span></p>
                    </div>
                    <!-- end of summary -->
                    <button class="checkout" id="checkout">CHECKOUT</button>
                </div>
                <!-- end of cart-menu-right -->
            </div>
            <!-- end of cart menu -->

            <!-- popup profile menu starts here -->

            <div class="profile-menu" id="profile-menu">
                <div class="profile-info-container">
                    <img src="./assets/avatar.jpg" alt="Profile Picture">
                    <p>Ram Prasad Subedi <p>

                </div>
                <a href="#"><i class="fa-solid fa-circle-user"></i> My Profile </a>
                <a href="#"><i class="fa-solid fa-cart-shopping"></i> My cart </a>
                <a href="#"><i class="fa-solid fa-circle-question"></i> Help </a>
                <a href="#"> <i class="fa-solid fa-arrow-right-from-bracket"></i>Sign Out </a>

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

<div class="menu-display" id="menu-display">

    <!-- menu menu-display continue ends in foot.php -->

    <script>
        let menuDisplay = document.getElementById("menu-display");
        let id = ["C01","C02","C03","C04"]
        for(let i in id){
            menuDisplay.innerHTML += `
            <div class="product">
                    <img src="./assets/item.png" alt="Product Image" class="product-image">
                    <span class="item-name">Momo</span>
                    <span class="price">RS. 120</span>
                    <div class="quantity">
                        <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                            <input type="number" value="1">
                            <i class="fa-solid fa-square-plus fa-lg" ></i>
                        </span>


                    </div>

                    <img class="order-btn btn${i}" src="./assets/addtocart.png" alt="Add To Cart">
                    </div>`
        }
    </script>
    <?php
    include './layout/foot.php';
    ?>