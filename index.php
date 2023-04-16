<?php
    include './layout/head.php';
?>
    <div class="hero middle-centered">
        <nav class="hero-items">
            <span>
                <img src="./assets/logo.png "class= "hero-logo">
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
                <div class="dropdown" >
                    <i class="fa-solid fa-user dropbtn" id="hero-profile-button" ></i>
                    <div class="dropdown-content" id="profile-menu">
                        <img src="./assets/logo.png" alt="user-profile">
                        <a>My Profile</a>
                        <a>Change Password</a>
                        <a>Help</a>
                        <a id="sign-out">Sign Out</a>
                    </div>
                </div>
                <!-- <div class="hero-menu" id="profile-menu">
                    My profile
                    
                </div> -->
                
            </span>
        </nav>
        <h1 class="hero-heading middle-centered-div">Hamro Canteen</h1>
    </div>
    <h1>Sunday's Treats</h1>
    <div class="menu-display">
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

