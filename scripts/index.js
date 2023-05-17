
const now = new Date();
const hour = now.getHours();

if(hour >0) {  //hour >=6 && hour<12
    var food;
$(document).on("load", displayProduct());
function displayProduct() {
  food = [
    "momo",
    "chowmein",
    "Pizza",
    "Sadeko Wai Wai",
    "chana Anda",
    "Samosa",
  ];
  let cart = [];
  let price = [120, 70, 50, 60, 25, 60]; 
  let url = [ "momo.jpg", "chowmein.jpg",  "pizza.jpeg", "waiwai.jpg","burger.jpg", "samosa.jpg"];

  for (let i = 0; i < food.length; i++) {
    document.getElementById("menu-display").innerHTML += `<div class="product">
    <form class = "productfrm">
       <img src="./assets/itemimage/${url[i]}" alt="Product Image" class="product-image">
       <span class="item-name">${food[i]}</span>
       <span class="price">RS. ${price[i]}</span>
       <div class="quantity">
           <span>Quantity: <button type ="submit" class ="qty-change-btn minus-btn${i}" id="minus-btn" onclick="change(${i}, 0);submitForm(event);" disabled >
           <i class="fa-solid fa-square-minus fa-lg minus"></i></button>
               <input type="number" name = "productQty" value="1" class="productQty${i}" id="productQty${i}" readonly> 
               <button type ="submit" class ="qty-change-btn plus-btn${i}"  onclick="change(${i},1);submitForm(event);"><i class="fa-solid fa-square-plus fa-l" ></i></button>              
           </span>
      
      
       </div>
      <div class="btn-holder">
      <input type = "hidden" name = "imageUrl" value ="${url[i]}"/>
      <input type = "hidden" name = "foodName" value ="${food[i]}"/>
      <input type = "hidden" name = "price" value ="${price[i]}"/> 
      <input type = "hidden" name = "productId" value ="${i}"> 
      <input type = "hidden" name = "productId" value ="${i}" name ="add-to-cart"> 
    
      
       <button class="add-to-cart-btn" ><i class="fa-solid fa-cart-plus"></i>  Add to Cart</button>

       </div>
       </form>
        
       </div>`;
  }
}

  

}else{
    document.getElementById("menu-display").innerHTML = 
    `<div class = "closed"> <img src ="./assets/closed.png" alt="Canteen Closed"/>
    <div>`;

}


function clearItem(itemId, Total) {
  document.getElementById(`${itemId}`).remove();
  Grandtotal = Grandtotal - Total;
  document.getElementById("gTotal").innerHTML = Grandtotal;
}
function checkout() {
  alert("checkout");
}
function submitForm(event) {
  event.preventDefault();
  // Your code to process the form data goes here
}
// increase and decrease the quantity of the item

function change(productId, buttonId) {
  let minusBtn = document.querySelector(`.minus-btn${productId}`);
  let plusBtn = document.querySelector(`.plus-btn${productId}`);

  let quantity = document.querySelector(`.productQty${productId}`).value;

  if (buttonId == 1) {
    quantity++;
    document.querySelector(`.productQty${productId}`).value = quantity;
  }
  if (buttonId == 0) {
    quantity--;
    document.querySelector(`.productQty${productId}`).value = quantity;
  }
  //    disables minus when quantity <=1
  if (quantity <= 1) {
    minusBtn.disabled = true;
    minusBtn.style.cursor = "not-allowed";
  }
  // disables the plus button while quantity >=5
  else if (quantity >= 15) {
    plusBtn.disabled = true;
    plusBtn.style.cursor = "not-allowed";
  }
  // runs when quantity is between 1-4
  else {
    minusBtn.disabled = false;
    plusBtn.disabled = false;
    plusBtn.style.cursor = "pointer";
    minusBtn.style.cursor = "pointer";
  }
}