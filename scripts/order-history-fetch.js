$(document).ready(function () {
  $.ajax({
    url: "./phpactions/orderFetch.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
      if (Array.isArray(response)) {
        fetchedResponse = response;
        response.forEach((item) => {
          $("table").append(`<tr>
            <td>${item["orderDate"]}</td>
            <td>${item["orderID"]}</td>
            <td>${item["gtotal"]}</td>
            <td>${item["payment"]}</td>
            <td>${item["status"]}</td>
            <td><button type="submit" onclick="displayBill(event, '${item['orderDate']}', ${item["orderID"]}, ${item["gtotal"]}, '${item["payment"]}', '${item["status"]}')">View Details</button></td>
          </tr>`);
        });
      } else {
        console.log("Invalid response format:", response);
      }
    },
    error: function (xhr, status, error) {
      console.log("AJAX error:", error);
    }
  });
});

function displayBill(event, orderDate, orderID, gtotal, payment, status) {
         $(".receipt_container").html(`
         <span>Receipt ID: 12345</span>
         <div class="header">
           <h2>Hamro Canteen</h2>
           <h4><u>Order Receipt</u><h4>
         </div>
         <div class="info">        
         
           <span>Order ID: ${orderID}</span>
     
           <span id='odate'>Order Date:${orderDate}</span>
           <span>Customer Name: Shiv Kumar Ghimire</span>     
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
               <td>Chana Anda</td>
               <td>1</td>
               <td>50</td>
               <td>50</td>
             </tr>
             <tr>
             <td>2</td>
             <td>MOMO</td>
             <td>1</td>
             <td>120</td>
             <td>120</td>
           </tr>
           <tr>
           <td>3</td>
           <td>Samosa</td>
           <td>1</td>
           <td>60</td>
           <td>60</td>
         </tr>
           </table>
           <div class="footer">
                 <span>payment: ${payment}</span>
                 <span>status:${status}</span>
                 <span>Total:RS. ${gtotal}</span>
           </div>`); 
          
        ;
        $('.receipt_container').css('display', 'block');
        $('.blockerr').css('display', 'block');
      }






  

       
     
      
    


//   `)


//   }
  function closeReceipt(){
    $('.receipt_container').css('display' , 'none');
    $('.blockerr').css('display' , 'none');
  }