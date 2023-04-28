// popup
let cart = document.getElementById("cart-menu");
let blocker = document.getElementById("blocker");
let profileMenu = document.getElementById("profile-menu");




// Function to open the popup
function openCart() {

  cart.style.display = "flex";
  blocker.style.display = "block";
  displayItems();
  displayBill();
  
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
checkout.addEventListener("click", alertbox);


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
        <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;" ></i>
    </div> 
    
    ` ;
}
