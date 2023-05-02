// popup
let cart = document.getElementById("cart-menu");
let blocker = document.getElementById("blocker");
let profileMenu = document.getElementById("profile-menu");




// Function to open the popup
function openCart() {

  cart.style.display = "flex";
  blocker.style.display = "block";
  
}

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





