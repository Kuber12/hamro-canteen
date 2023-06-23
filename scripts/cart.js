// Popup
let cart = document.getElementById("cart-menu");
let blocker = document.getElementById("blocker");
let profileMenu = document.getElementById("profile-menu");
let paymentOptions = document.getElementById("payment_option");

// Function to open the popup
function openCart() {
  cart.style.display = "flex";
  openBlocker();
}


function closePopup() {
  cart.style.display = "none";
  profileMenu.style.display = "none";
  paymentOptions.style.display = "none";
  blocker.style.display = "none";
}

function openBlocker() {
  blocker.style.display = "block";
}

// Profile menu open
function openProfile() {
  openBlocker();
  profileMenu.style.display = "block";
}

function openOption() {
  paymentOptions.style.display = "block";
  cart.style.display = "none";
  openBlocker();
  

}
function closeOptions(){
  paymentOptions.style.display = "none" ;
  openCart();
}
