<?php
include './layout/head.php';
?>
    <div class="hero middle-centered">
        <nav class="hero-items">
            <span>
                <img src="./assets/logo-yellow.png "class= "hero-logo">
            </span>
            <span>
                <i class="fa-solid fa-cart-shopping" id="hero-cart-button"></i>
                <div id="myPopup" class="popup">
                    <div class="cart-menu-pop popup-content" >
                        <h1>My Orders</h1>
                        <div class="cart-menu-items">
                            <img class="item-image" src="assets/item.png" alt="item">
                            <h3 class="item-name">Momo</h3>
                            <h3 class="item-price">Rs 120</h3>
                            <input type="number" name="quantity" class="quantity">
                            <h3 class="item-equalto">=</h3>
                            <h3 class="item-total">240</h3>
                            <i class="fa-solid fa-circle-xmark item-delete"></i>
                        </div>
                        <div class="cart-menu-items">
                            <img class="item-image" src="assets/item.png" alt="item">
                            <h3 class="item-name">Momo</h3>
                            <h3 class="item-price">Rs 120</h3>
                            <input type="number" name="quantity" class="quantity">
                            <h3 class="item-equalto">=</h3>
                            <h3 class="item-total">240</h3>
                            <i class="fa-solid fa-circle-xmark item-delete"></i>
                        </div>
                        <div class="cart-menu-items">
                            <img class="item-image" src="assets/item.png" alt="item">
                            <h3 class="item-name">Momo</h3>
                            <h3 class="item-price">Rs 120</h3>
                            <input type="number" name="quantity" class="quantity">
                            <h3 class="item-equalto">=</h3>
                            <h3 class="item-total">240</h3>
                            <i class="fa-solid fa-circle-xmark item-delete"></i>
                        </div>
                        <h2 style="text-align:right">Total = <span class="items-total">240
                        </span></h2>
                    </div>
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
        <span class="price">RS. 120</span>
        <div>             
            <span>Quantity: <button >-</button> 
            <input type="number" value="1">
            <button>+</button> 
        </span>
             
               
        </div>

        <img class="order-btn" src="./assets/Ordernow.png" alt="ordernow">
       
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