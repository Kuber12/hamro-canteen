// popup
let cart = document.getElementById("cart-menu");
let cartButton = document.getElementById("hero-cart-button");
let blocker = document.getElementById("blocker");
let profileButton = document.getElementById("hero-profile-button");
let profileMenu = document.getElementById("profile-menu");
let cartCloseBtn = document.getElementById("close");
let backToShopping = document.getElementById("back-to-shopping");
let checkout = document.getElementById("checkout");

//open popup (profile,  cart);

cartButton.addEventListener("click", openCart);
profileButton.addEventListener("click", openProfile);

// Function to open the popup
function openCart() {
  cart.style.display = "flex";
  blocker.style.display = "block";
  displayItems();
}

blocker.addEventListener("click", closePopup);

// Function to close the popup
cartCloseBtn.addEventListener("click", closePopup);
backToShopping.addEventListener("click", closePopup);

function closePopup() {
  profileMenu.style.display = "none";
  cart.style.display = "none";
  blocker.style.display = "none";
}

//profile-menu open

function openProfile() {
  blocker.style.display = "block";
  profileMenu.style.display = "block";
}
checkout.addEventListener("click", alertbox);

function alertbox() {
  confirm("Are you sure ??");
}

function displayItems() {
  document.querySelector(".items").innerHTML += `

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
    
    `;
}

function displayBill() {
    
}

function checkout()  {

    

}