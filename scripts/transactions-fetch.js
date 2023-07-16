$(document).ready(function() {
    // Make AJAX request
    $.ajax({
    url: './phpactions/transactionsFetch.php', // URL of your PHP script
    method: 'GET', // or 'POST' depending on your PHP script
    dataType: 'json', // Expect JSON data in response
    success: function(response) {
        // Handle successful response
        fetchedResponse = response;
        response.forEach(item => {
            let markup = `
            <tr>
                <td>${item['orderDate']}</td>
                <td>${item['orderID']}</td>
                <td>${item['fullName']}</td>;
                <td>${item['phone']}</td>
                <td>${item['payment']}</td>
                <td>${item['status']}</td>
                <td>${item['gtotal']}</td>
                <td><button class='view_btn' type="submit" onclick="displayBill(event, '${item['orderDate']}','${item['fullName']}', ${item["orderID"]}, ${item["gtotal"]}, '${item["payment"]}', '${item["status"]}')">View Receipt</button></td>
            </tr>`;
            
            $('.styled-table tbody').append(markup);
        });
        // Display fetched data in HTML element

    },
    error: function(xhr, status, error) {
        // Handle error response
        console.error(error);
    }
    });
}); 
function displayBill(event, orderDate,fullName, orderID, gtotal, payment, status) {
    $.ajax({
      url: './phpactions/generateBill.php',
      type: "POST",
      data: {
        orderID: orderID,
      },
      dataType: "json", // Add this line to parse the response as JSON
      success: function(response) {
        console.log(response);
        $("#cName").text(`Name: ${fullName}`);
        $("#odate").text(`Order Date: ${orderDate}`);
        $("#orderID").text(`Order ID: ${orderID}`);
        let tmp;
      
        $(".receipt tbody").empty();
        for (let i = 0; i < response.length; i++) {
          const order = response[i];
          tmp += `
            <tr>
              <td>${i+1}</td>
              <td>${order["foodName"]}</td>
              <td>${order["quantity"]}</td>
              <td>${order["price"]}</td>
              <td>${order["quantity"] * order["price"]}</td>
            </tr>
          `
        }
        tmp += `<tr>
          <td colspan="3"></td>
          <td class='total'>Grand Total</td>
          <td>${gtotal}</td>
        </tr>`;
        $(".receipt tbody").append(tmp);
        $("#receipt_container #footer").remove();
        $("#receipt_container").append(`
          <div id="footer">
            <span>Payment: ${payment}</span>
            <span>Status: ${status}</span>
            <button>Download Receipt</button>
          </div>
        `);
      },
      error: function(xhr, status, error) {
        console.log("AJAX error:", error);
      }
    });
    $('.receipt_container').show();
    $('.blockerr').show();
  
  
  }
  function closeReceipt() {
    $('.receipt_container').hide();
    $('.blockerr').hide();
  }
  