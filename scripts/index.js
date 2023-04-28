


 // display product

 function displayProduct(){
    let food =  [ "momo", "chowmein", "Pizza" , "Burger", "chana Anda", "Samosa"];
    let price = [120,70,50,60,25,60];
   
    for(let i = 0; i < food.length; i++){
   
       document.getElementById("menu-display").innerHTML +=
   
       ` <div class="product">
       <img src="./assets/item.png" alt="Product Image" class="product-image">
       <span class="item-name">${food[i]}</span>
       <span class="price">RS. ${price[i]}</span>
       <div class="quantity">
           <span>Quantity: <button class ="qty-change-btn minus-btn${i}" id="minus-btn" onclick="change(${i}, 0)" disabled >
           <i class="fa-solid fa-square-minus fa-lg minus"></i></button>
               <input type="number" value="1" class="productQty${i}" disabled>
               <button class ="qty-change-btn plus-btn${i}"  onclick="change(${i},1)"><i class="fa-solid fa-square-plus fa-lg " ></i></button>
              
           </span>
      
      
       </div>
      <div class="btn-holder">
       <button  class="add-to-cart-btn btn${i} onclick="addToCart(${i})"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
       <button class="order-btn btn${i}"><i class="fa-solid fa-bolt-lightning"></i> Order Now</button>
       </div>
        
       </div>`
          
    
    }
}



// increase and decrease the quantity of the item

function change(productId,buttonId) {

    let minusBtn = document.querySelector(`.minus-btn${productId}`);
    let plusBtn = document.querySelector(`.plus-btn${productId}`);



    let quantity =  document.querySelector(`.productQty${productId}`).value;
    

    if(buttonId==1) {

    quantity++;
    document.querySelector(`.productQty${productId}`).value = quantity;
   
         
    }
    if(buttonId==0){
    quantity--;
    document.querySelector(`.productQty${productId}`).value = quantity;

   }
//    disables minus when quantity <=1
if(quantity <= 1) {
    minusBtn.disabled = true;
    minusBtn.style.cursor = "not-allowed"; 

}
// disables the plus button while quantity >=5
else if(quantity>=15){
    plusBtn.disabled = true;
    plusBtn.style.cursor = "not-allowed"; 
}
// runs when quantity is between 1-4
else{
    minusBtn.disabled = false;
    plusBtn.disabled = false;
    plusBtn.style.cursor = "pointer";
    minusBtn.style.cursor = "pointer";

}
    
}
