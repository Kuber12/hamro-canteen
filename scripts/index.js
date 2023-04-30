

var food;

 function displayProduct(){
   

    food =  [ "momo", "chowmein", "Pizza" , "Burger", "chana Anda", "Samosa"];
    let price = [120,70,50,60,25,60];
    
   
    for(let i = 0; i < food.length; i++){
   
       document.getElementById("menu-display").innerHTML += ` <div class="product">
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
       <button  class="add-to-cart-btn btn${i}" onclick="addToCart(${i},'${food[i]}',${price[i]})"><i class="fa-solid fa-cart-plus"></i>  Add to Cart</button>
       </div>
        
       </div>`
          
    
    }
}
function addToCart (id, food, price) {
  
    sessionStart();
    alert("session started");
    var name = "ram";
    var user = {'name': name, 'foodName':food, 'price':price };
    sessionStorage.setItem('user', JSON.stringify(user));
    var details = JSON.parse(sessionStorage.getItem('user')); // An object  

    document.getElementById("items").innerHTML += `

    <div class="item-row" id="${id}">
        <img src="./assets/burger.jpg" alt="burger">
        <p>${details.foodName}</p>
        <p>${details.price}</p>
        <p>X</p>    
        <!-- quantity specifier -->
        <span class="qty">
            <i class="fa-solid fa-square-minus fa-lg" style="color: #000000; margin-left:3px;"></i>
            <input type="number" value="1">
            <i class="fa-solid fa-square-plus fa-lg"></i>
        </span>
        <!-- delete item from the cart -->
        <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;" onclick="clearItem(${id})"></i>
    </div> 
    
    ` ;

    document.getElementById("summary").innerHTM += `    
    <p> <span> ${food} </span> <span> X 2 </span> <span> = 240 </span></p>
    <p><span style="margin-left:20px;">TOTAL </span> <span> = 720 </span></p>
`

;

      
    
}
var sessionId;
 function sessionStart() {    
    clearTimeout(sessionId);
    setTimeout(sessionTimeout, 5000);
 }

  function sessionTimeout() {
    // Loop through div elements with IDs "1" through "10" and remove them
    for (let j = 0; j <=food.length; j++) {
      let element = document.getElementById(j.toString());
      if (element) {
        element.remove();
      }
    }
    // Display an alert message to notify the user of the session timeout
    alert("session timeout");
  }
  



function clearItem (itemId) {
    document.getElementById(`${itemId}`).remove();
    

}
function checkout() {
    alert("checkout");
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

