 

$('#cart').click(function(){
  displayItem();
})
// $('.remove-item').click(function(){
//   alert("are you sure");
// })



function displayItem() {

  $.ajax({
    url: './phpactions/cartManager.php',
    method: 'POST',  
    dataType: 'json', // Expect JSON data in response
    success: function(response) {
  
      $("#items").html(``);
     for( i = 0 ; i< response.value1.length ; i++){
       total = response['value1'][i]['price']*response['value1'][i]['quantity'];
      $("#items").append( `<div class="item-row" >
       
             <p><img src="./assets/itemimage/${response['value1'][i]['imageurl']}" alt="product image"></p>
             <p id="product-name">${response['value1'][i]['foodName']}</p>
             <p>${response['value1'][i]['price']}</p>
             <p>X</p> 
             
             <p>${response['value1'][i]['quantity']}</p>
             <p> = </p>
             <p>${total} </p>
             <!-- delete item from the cart -->
             <form class ="cartItemsFrm"  action = "./phpactions/cartManager.php" method="POST">
             <button  class="remove-item"><i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;" ></i></button>
               <input type="hidden" name = "remove-item"/>               
               <input type="hidden" name = "foodName" value ="${response['value1'][i]['foodName']}"/>
             </form>
             
             </div> 
             
             `);
      
     }

            $('#gTotal').html(`${response.value2}`);
     
    }}
    )};

    
    




































