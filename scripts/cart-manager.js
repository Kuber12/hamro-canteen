$(document).ready(function () {
  // Function to get and display the number of items in the cart
  function noOfItems() {
      $.ajax({
          url: './phpactions/cartManager.php',
          method: 'POST',
          dataType: 'json',
          data: { getCount: true }, // Sending an additional parameter to indicate counting items
          success: function (response) {
              if (response !== null) {
                  console.log("Number of items in the cart:", response.value1.length);
              } else {
                  console.error("Unexpected response format for value1:", response);
              }
          },
          error: function (xhr, status, error) {
              console.error("AJAX error:", error);
          },
      });
  }

  // Call the function to get and display the number of items when the document is ready
  noOfItems();

  // Add other event handlers or functions as needed
});



$('#cart').click(function(){
  displayItem();
})




function displayItem() {
  $.ajax({
    url: './phpactions/cartManager.php',
    method: 'POST',
    dataType: 'json',
    success: function (response) {
      console.log(response);
      $("#items").html(``);
      if (response) {
        for (var i = 0; i < response.value1.length; i++) {
         
            total = response['value1'][i]['price'] * response['value1'][i]['quantity'];
            $("#items").append(`<div class="item-row" >
         
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
               
               </div>`);
          
        }
      } else {
        // Handle the case where response.value1 is not an array
        console.error("Unexpected response format for value1:", response.value1);
      }

      // Update the following part as well
      var totalItem = response.value1 ? response.value1.length : 0;

      if (totalItem === 0) {
        $('#checkout').prop('disabled', true);
        $('.items').addClass('empty');
      } else {
        $('#checkout').prop('disabled', false);
        $('.items').removeClass('empty');
      }
    },
    error: function (xhr, status, error) {
      // Handle AJAX error
      console.error("AJAX error:", error);
    },
  });
}


    function removeItem(event) {
      event.preventDefault();
    
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) { // User clicked "Yes, delete it!"
          var formdata = $('.removeItem').serialize();
    
          $.ajax({
            url: './phpactions/cartManager.php',
            type: 'POST',
            data: formdata,
            success: function (response) {             
                
                displayItem();
                noOfItems();
              
            }
          });
        }
      });
    }
    
  




































