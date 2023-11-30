

$(document).ready(function(){
  displayProduct();
  
});

function displayProduct() {

  $.post("./phpactions/displayItemFetch.php", function(data, status){

    

     data = JSON.parse(data);    
      $("#menu-display").html(""); 
       
      data.forEach(function (item,i) {
        $("#menu-display").append(`
          <div class= "product">
            <img src="./assets/itemimage/${item.itemImg}" alt="Product Image" class="product-image">
            <span class="item-name">${item.itemName}</span>
            <span class="price">RS.${item.itemPrice}</span>
            <div class="quantity">
              <span>Quantity: 
                <button type="submit" class="qty-change-btn minus-btn${i}" id="minus-btn" onclick="change(${i}, 0);submitForm(event);" disabled>
                  <i class="fa-solid fa-square-minus fa-lg minus"></i>
                </button>
                <input type="number" name="productQty" value="1" class="productQty${i}" id="productQty${i}" readonly>
                <button type="submit" class="qty-change-btn plus-btn${i}" onclick="change(${i}, 1);submitForm(event);">
                  <i class="fa-solid fa-square-plus fa-lg"></i>
                </button>
              </span>
            </div>           
            <button class="add-to-cart-btn" name="add-to-cart" onclick="addToCart('${i}','${item.itemID}','${item.itemName}',${item.itemPrice},'${item.itemImg}')">
  <i class="fa-solid fa-cart-plus"></i> Add to Cart
</button>

               
              </div>
            </div>
        `);
      });
    });
 
   
  }
 /// go to cart manager for addtocart,remove  and place order
 
  function change(productId, buttonId) {
    var minusBtn = $(".minus-btn" + productId);
    var plusBtn = $(".plus-btn" + productId);
    var quantity = $(".productQty" + productId).val();

    if (buttonId == 1) {
      quantity++;
      $(".productQty" + productId).val(quantity);
    }
    if (buttonId == 0) {
      quantity--;
      $(".productQty" + productId).val(quantity);
    }

    if (quantity <= 1) {
      minusBtn.prop("disabled", true).css("cursor", "not-allowed");
    } else if (quantity >= 15) {
      plusBtn.prop("disabled", true).css("cursor", "not-allowed");
    } else {
      minusBtn.prop("disabled", false).css("cursor", "pointer");
      plusBtn.prop("disabled", false).css("cursor", "pointer");
    }
  }

 
  
$(document).ready(function() {


  $('#closed').hide();
  var currentTime = new Date();

var hours = currentTime.getHours()

if(hours > 23){
    $('#menu-display').hide();
    $('#closed').show();

}else{
    $('#menu-display').show();
    $('#closed').hide();
}
});

