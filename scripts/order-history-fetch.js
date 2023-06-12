$(document).ready(function () {
  // alert("Hello");
  $.ajax({
    url: "./phpactions/orderFetch.php",
    type: "POST",
    dataType: "json",

    success: function (response) {
      // $('table').html(``);
      fetchedResponse = response;
      response.forEach((item) => {
        $("table").append(`<tr>
                   
                    <td>${item["orderDate"]}</td>
                    <td>${item["orderID"]}</td>;
                    <td>${item["price"]}</td>
                    <td>cash</td>
                     <td>paid</td>
                     <td><button type="submit" onclick="displayBill('${item['orderDate']}',${item["orderID"]},${item["price"]},'cash', 'paid')">View Details</td>
                    </tr>`);
      });
     
    },
  });
});
let orderDate=0, orderID, total, payment, status;
function displayBill( orderDate,orderID, total, payment ,status){
  $('.receipt_container').html(`
  
    <span>Receipt ID: 12345</span>
    <div class="header">
      <h2>Hamro Canteen</h2>
      <h4><u>Order Receipt</u><h4>
    </div>
    <div class="info">        
    
      <span>Order ID: ${orderID}</span>
      <span>Order Date:${orderDate}</span>      
      <span>Person's Name: John Doe</span>        
     
      
    
    </div>
    <table class ="receipt">
      <tr>
        <th>S.N</th>
        <th>Particulars</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Total</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Item 1</td>
        <td>2</td>
        <td>$10</td>
        <td>$20</td>
      </tr>
    </table>
    <div class="footer">
          <span>payment: ${payment}</span>
          <span>status:${status}</span>
          <span>Total: ${total}</span>
    </div>

  `)
  $('.receipt_container').css('display', 'block');
  $('.blockerr').css('display', 'block');

  }
  function closeReceipt(){
    $('.receipt_container').css('display' , 'none');
    $('.blockerr').css('display' , 'none');
  }