<?php
include './layout/head.php';
?>

<div class="hero middle-centered">
    <div class="hero-items">
        <span>
            <img src="./assets/logo-yellow.png " class="hero-logo">
        </span>
        <span>
            <div class="click-menu">
                <i class="fa-solid fa-cart-shopping fa-beat hero-cart"></i>
                <div class="cart-menu hero-menu">
                    <ul>
                        <li><img src="./assets/logo.png" alt="user-profile"></li>
                        <li><a href="#">Menu item 2</a></li>
                        <li><a href="#">Menu item 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="click-menu">
                <i class="fa-solid fa-user hero-profile"></i>
                <div class="profile-menu hero-menu">
                    <ul>
                        <li><a href="#">Menu item 1</a></li>
                        <li><a href="#">Menu item 2</a></li>
                        <li><a href="#">Menu item 3</a></li>
                    </ul>
                </div>
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
<h3>Today's Menu</h3>
<div class="menu-display">
    <div class="product">
       <i class="fa fa-thumb-tack" aria-hidden="true"></i>
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <h2 class="item-name">Momo</h2>
        <p class="price">120</p>
        <button class="order-btn">Add to Cart</button>
    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <h2 class="item-name">Momo</h2>
        <p class="price">120</p>
        <button class="order-btn">Add to Cart</button>
    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <h2 class="item-name">Momo</h2>
        <p class="price">120</p>
        <button class="order-btn">Add to Cart</button>
    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <h2 class="item-name">Momo</h2>
        <p class="price">120</p>
        <button class="order-btn">Add to Cart</button>
    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <h2 class="item-name">Momo</h2>
        <p class="price">120</p>
        <button class="order-btn">Add to Cart</button>
    </div>
    <div class="product">
        <img src="./assets/item.png" alt="Product Image" class="product-image">
        <h2 class="item-name">Momo</h2>
        <p class="price">120</p>
        <button class="order-btn">Add to Cart</button>
    </div>
</div>
<?php
include './layout/foot.php';
?>