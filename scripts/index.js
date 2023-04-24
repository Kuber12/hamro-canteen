// popup
let popup = document.getElementById("cart-menu");
let cartButton = document.getElementById("hero-cart-button");
let blocker = document.getElementById("blocker");
let profileButton = document.getElementById("hero-profile-button");
let profileMenu = document.getElementById("profile-menu");
let cartCloseBtn = document.getElementById("close");
let backToShopping = document.getElementById("back-to-shopping");
let checkout = document.getElementById("checkout");

//open popup (profile,  cart);

cartButton.addEventListener("click",openPopup);
profileButton.addEventListener("click", openProfile);


// Function to open the popup
function openPopup() {
  
    popup.style.display = "flex";
    blocker.style.display = "block";

}

blocker.addEventListener("click", closePopup);

// Function to close the popup
cartCloseBtn.addEventListener("click", closePopup);
backToShopping.addEventListener("click", closePopup);
function closePopup() {

    profileMenu.style.display = "none";
    popup.style.display = "none";
    blocker.style.display = "none";

}

//profile-menu open

function openProfile() {
    blocker.style.display ="block";
    profileMenu.style.display = "block";
    
}
 checkout.addEventListener("click",alertbox);

 function alertbox() {
    confirm("Are you sure ??");
 }



