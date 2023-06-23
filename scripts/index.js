


  var food;

  $(document).on("load", displayProduct());

  function displayProduct() {
    var menuItems;

    $.ajax({
      url: "./phpactions/displayItemFetch.php", // URL of your PHP script
      method: "GET", // or 'POST' depending on your PHP script
      dataType: "json", // Expect JSON data in response
      success: function (response) {
        for (i = 0; i < response.length; i++) {
          document.getElementById(
            "menu-display"
          ).innerHTML += `<div class="product">
      <form class = "productfrm" >
         <img src="./assets/itemimage/${response[i]['itemImg']}" alt="Product Image" class="product-image">
         <span class="item-name">${response[i]['itemName']}</span>
         <span class="price">RS. ${response[i]['itemPrice']}</span>
  
         <div class="quantity">
             <span>Quantity: <button type ="submit" class ="qty-change-btn minus-btn${i}" id="minus-btn" onclick="change(${i}, 0);submitForm(event);" disabled >
             <i class="fa-solid fa-square-minus fa-lg minus"></i></button>
                 <input type="number" name = "productQty" value="1" class="productQty${i}" id="productQty${i}" readonly> 
                 <button type ="submit" class ="qty-change-btn plus-btn${i}"  onclick="change(${i},1);submitForm(event);"><i class="fa-solid fa-square-plus fa-lg" ></i></button>              
             </span>
        
        
         </div>
        <div class="btn-holder">
        <input type = "hidden" name = "imageUrl" value ="${response[i]['itemImg']}"/>
        <input type = "hidden" name = "foodName" value ="${response[i]["itemName"]}"/>
        <input type = "hidden" name = "price" value ="${response[i]["itemPrice"]}"/> 
        <input type = "hidden" name = "foodID" value ="${response[i]['itemID']}"/> 
        <input type = "hidden" name = "add-to-cart" value ="${i}" > 
      
        
         <button class="add-to-cart-btn"  name = "add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to Cart</button>
  
         </div>
         </form>
          
         </div>`;
        }
      },
    });
  }


function clearItem(itemId, Total) {
  document.getElementById(`${itemId}`).remove();
  Grandtotal = Grandtotal - Total;
  document.getElementById("gTotal").innerHTML = Grandtotal;
}

function submitForm(event) {
  event.preventDefault();

}
function paymentOption(){
  openOption();
  document.getElementById('payment_option').innerHTML = `<h2> Choose Payment Options</h2>
  <button onclick="cash();">Cash </button> <button onclick="alert('it will be activated after e-sewa integration')">E-Sewa</button> <button onclick="closeOptions();">Cancel</button> 
  <i class="fa-solid fa-circle-xmark fa-xl" id="close" onclick="closeOptions();"></i>`;


}


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
function  cash(){
  window.location.href = "./checkout.php";
}
