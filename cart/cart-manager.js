$(document).ready(function(){
  displayCart();
});

$('#cart').click(function(){
  displayCart();
});

 // go to cartManager.js to find add to cart
 function addToCart(i,id,name,price,image){

  var qty = $(`#productQty${i}`).val();

 //  console.log(i);
 //  console.log(qty);

    $.post("./cart/cartManager.php",{
   foodID:id,
   foodName:name,
   price:price,
   imageUrl:image,
   productQty: qty, 
 },
  function(data,status){
  
  if(status == "success"){
   Swal.fire({
     position: 'center',
     icon: 'success',
     title: 'Iteam Added successfully',
     text: 'Welcome to your cart.',
     showConfirmButton: false,
     timer: 1000,
   });
   displayCart();
  }
  }

 )

}

 
 

 function clearItem(itemId, Total) {
   $("#" + itemId).remove();
   Grandtotal = Grandtotal - Total;
   $("#gTotal").html(Grandtotal);
 }

 function submitForm(event) {
   event.preventDefault();
 }

 function paymentOption() {
   openOption();
   $("#payment_option").html(`
     <h2>Payment Options</h2>
     <div id ='option_container'>
     <img src='./assets/cod.png' id="cod" onclick="placeorder()";>
     <img src="./assets/meroWalletWhite.png" id = "mero_wallet" onclick='window.location.href = "./wallet/paymentForm.php"' alt ='mero wallet'>
     </div>
     <button id ='cancel' onclick="closeOptions();">Cancel</button>
     <i class="fa-solid fa-arrow-left" id="close" onclick="closeOptions();"></i>
    
   `);
 }


function displayCart(){
  
  $.post("./cart/viewCart.php", function(data, status){
   
    if(data){

      var itemCount  =  0;
      var grandTotal  =  0;
      $("#items").html(``);
      data = JSON.parse(data);
      
       data.forEach(function (item) {
   
         var total = item['price'] * item['quantity'];
         grandTotal += total;
         $("#items").append(`
           <div class="item-row">
             <p><img src="./assets/itemimage/${item['imageurl']}" alt="product image"></p>
             <p id="product-name">${item['foodName']}</p>
             <p>${item['price']}</p>
             <p>X</p> 
             <p>${item['quantity']}</p>
             <p> = </p>
             <p>${total}</p>
           
        
               <input type="hidden" name="remove-item" />
               <button class="remove-item" onclick="removeItem('${item.foodName}')">
                 <i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;"></i>
               </button>
            
           </div>`);

           itemCount++;
         
       });
       let Gtotal = grandTotal;
       let noOfItems = itemCount;
       if(noOfItems > 0 ){
        $('.items').removeClass('empty');
        $('#checkout').prop('disabled', false);
        $('#noOfItems').show();
        $('#noOfItems').html(noOfItems);
        $('#gTotal').html(Gtotal);
        
        
       }else{
        $('#checkout').prop('disabled', true);
        $('.items').addClass('empty');
        $('#noOfItems').hide();
        $('#gTotal').html("0.000");        
       }
     
      
      
    }else{
      console.log("error while getting the data from cart Manager:");
    }
  
  });
  
}

function removeItem(foodName) {
 
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }) .then((result) => {
    if (result.isConfirmed) {
   
      $.post('./cart/removeItem.php',{
        foodName : foodName,
      },
      function(data,status){
        if(status == "success"){
          displayCart();
        }else{
          alert("Error: an unexpected error encounterd");
        }
      }
      
      )};
    });
}

function placeorder(){

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes! Place order'
  }).then((result) => {
    if (result.isConfirmed) { 
       window.location.href = "./cart/checkout.php";


}
  })
}
