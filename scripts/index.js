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


 // display product

 function displayProduct(){
    let food =  [ "momo", "chowmein", "Pizza" , "Burger", "chana Anda"];
    let price = [120,70,50,60,25];
   
    for(let i = 1; i <= food.length; i++){
   
       document.getElementById("menu-display").innerHTML +=
   
       ` <div class="product">
       <img src="./assets/item.png" alt="Product Image" class="product-image">
       <span class="item-name">${food[i]}</span>
       <span class="price">RS. ${price[i]}</span>
       <div class="quantity">
           <span>Quantity: <button class ="qty-change-btn minus-btn"  onclick="change(${i}, 0)"><i class="fa-solid fa-square-minus fa-lg minus"></i></button>
               <input type="number" value="1" class="productQty${i}" >
               <button class ="qty-change-btn plus-btn"  onclick="change(${i},1)"><i class="fa-solid fa-square-plus fa-lg " ></i></button>
           </span>
      
      
       </div>
      
       <img class="order-btn btn ${i}" src="./assets/addtocart.png" alt="Add To Cart">
        
       </div>`
          
    
    }
}





function change(i,l) {

    let quantity =  document.querySelector(`.productQty${i}`).value;

    if(l==1) {

    quantity++;
    document.querySelector(`.productQty${i}`).value = quantity;
    if(quantity>5){
        document.querySelector(".plus-btn").disabled = true;
        document.querySelector(".minus-btn").disabled = false;
    }
        
    }
    if(l==0){
    quantity--;
    document.querySelector(`.productQty${i}`).value = quantity;
    if(quantity<0){
        document.querySelector(".minus-btn").disabled = true;
        document.querySelector(".plus-btn").disabled = false;
    }
   }

    
}
