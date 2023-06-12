$(document).on("load", noOfItems());

function noOfItems(){

  $.ajax({
    url: './phpactions/cartManager.php',
    method: 'POST',  
    dataType: 'json', // Expect JSON data in response
    success: function(response) {
  $('#noOfItems').html(`${response.value1.length}`);
  totalItem = response.value1.length;
  if(totalItem==0|| totalItem==null|| totalItem==undefined || totalItem ==" "){
 
    $('.noOfItems').css('display', 'none');


   }
   else{

    $('.noOfItems').css('display', 'block');
   }  
 
 
}});
  }


$('#cart').click(function(){
  displayItem();
})



function displayItem() {  

  $.ajax({
    url: './phpactions/cartManager.php',
    method: 'POST',  
    dataType: 'json', 
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
             <form class ="removeItem">
             <input type ="hidden" name="remove-item" />
             <input type="hidden"  name = "foodName" value ="${response['value1'][i]['foodName']}"/>
             <button type="submit"  class="remove-item" name="remove-item" onclick="removeItem(event)"><i class="fa-solid fa-circle-xmark fa-xl" style="color: #000000;" ></i></button>             
               
             </form>
             
             </div> 
             
             `);
      
     }


            $('#gTotal').html(`${response.value2}`);           
            var totalItem =response.value1.length;


            if(totalItem==0|| totalItem==null|| totalItem==undefined || totalItem ==" "){
             $('#checkout').prop('disabled', true);
             $('.items').addClass('empty');

            }
            else{
             $('#checkout').prop('disabled', false);
             $('.items').removeClass('empty');
     
            }     
    }}
    )};
     
function removeItem(event){
  var formdata = $('.removeItem').serialize();
  event.preventDefault();

  $.ajax({
    url: './phpactions/cartManager.php',
    type: 'POST',
    data : formdata,

    success: function (response){
    //  alert ("success");
     displayItem();
     noOfItems();
    }

  });
}
  




































