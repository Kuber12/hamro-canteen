<?php
include './layout/head.php';
?>
<div class="hero middle-centered">

    <div class="hero-items">
        <!-- logo container -->
        <span>
            <img src="./assets/logo-white.png " class="hero-logo">
        </span>

        <!-- cart and user icon container -->
        <span>
            <i class="fa-solid fa-cart-shopping fa-beat hero-cart"></i>
            <i class="fa-solid fa-user hero-profile"></i>

            <!-- cart menu starts here -->
            <div class="cart-menu">

                <!-- left part of cart menu -->
                <div class="cart-menu-left">
                    <!-- cart header -->
                    <div class="cart-header">
                        <h2><i class="fa-sharp fa-solid fa-cart-shopping" style="margin-right:10px;"></i>My Cart</h2>
                    </div>

                    <div class="items">
                    <div class="item-row">
                        <input type="checkbox" checked/>
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
                  <input type="checkbox" checked/>
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
                  <input type="checkbox" checked/>
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
                  <input type="checkbox" checked/>
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
                  <input type="checkbox" checked/>
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


                    
                    <button><i class="fa-solid fa-arrow-left " style="margin-right:5px;"></i> back to shopping</button>

                </div>

                <!-- cart menu right side -->
                <div class="cart-menu-right">
                    <span><i class="fa-solid fa-circle-xmark fa-2xl" style="color: #000000;"></i></span>
                    <h2>Summary</h2>
                    <p>1. MOMO X 2 = 240</p>
                    <p>2. MOMO X 2 = 240</p>
                    <p>3. MOMO X 2 = 240</p>
                    <p>Total = 720</p>
                    <button class="checkout">CHECKOUT</button>
                </div>
            </div>

            <div class="profile-menu">
                <div class="profile-info-container">
                    <img src="./assets/avatar.jpg" alt="Profile Picture">
                    <p>Ram Prasad Subedi
                    <p>

                </div>
                <a href="#"><i class="fa-solid fa-circle-user"></i> My Profile </a>
                <a href="#"><i class="fa-solid fa-cart-shopping"></i> My cart </a>
                <a href="#"><i class="fa-solid fa-circle-question"></i> Help </a>
                <a href="#"> <i class="fa-solid fa-arrow-right-from-bracket"></i>Sign Out </a>

            </div>
        </span>

    </div>

    <h1 class="hero-heading middle-centered-div">Hamro Canteen</h1>
    <div class="marquee">
        <marquee behavior="alternate" direction="left" width="100%">
            <h2>Sunday's Treats</h2>
        </marquee>
    </div>
</div>
<div id="menu">
    <h3>Today's Menu</h3>
</div>

<div class="menu-display">
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="add  to cart">

    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <span class="item-name">Momo</span>
        <span class="price">RS. 120</span>
        <div class="quantity">
            <span>Quantity: <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
                <input type="number" value="1">
                <i class="fa-solid fa-square-plus fa-lg"></i>
            </span>


        </div>

        <img class="order-btn" src="./assets/addtocart.png" alt="Add To Cart">

    </div>



    <?php
    include './layout/foot.php';
    ?>