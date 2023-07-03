$(document).ready(function() {
  $.ajax({
    url: "./phpactions/orderFetch.php",
    type: "POST",
    dataType: "json",
    success: function(response) {
      if (Array.isArray(response)) {
        fetchedResponse = response;
        response.forEach((item) => {
          $(".orders").append(`<tr>
            <td>${item["orderDate"]}</td>
            <td>${item["orderID"]}</td>
            <td>${item["gtotal"]}</td>
            <td>${item["payment"]}</td>
            <td>${item["status"]}</td>
            <td><button class='view_btn' type="submit" onclick="displayBill(event, '${item['orderDate']}', ${item["orderID"]}, ${item["gtotal"]}, '${item["payment"]}', '${item["status"]}')">View Receipt</button></td>
          </tr>`);
        });
      } else {
        console.log("Invalid response format:", response);
      }
    },
    error: function(xhr, status, error) {
      console.log("AJAX error:", error);
    }
  });
});

function displayBill(event, orderDate, orderID, gtotal, payment, status) {
  $.ajax({
    url: './phpactions/generateBill.php',
    type: "POST",
    data: {
      orderID: orderID,
    },
    success: function(response) {
      $("#odate").html(`Order Date: ${orderDate}`);
      $("#orderID").html(`Order ID: ${orderID}`);

      const data = JSON.parse(response);
      $("#fitems").html(``);
      for (let i = 0; i < data.length; i++) {
        const order = data[i];
        $("#fitems").append(`
          <tr>
            <td>${i + 1}</td>
            <td>${order.foodName}</td>
            <td>${order.quantity}</td>
            <td>${order.price}</td>
            <td>${order.total}</td>
          </tr>
        `);
      }
      $(".receipt").append(`
        </tbody></table>
        <div id="footer">
          <span>Payment: ${payment}</span>
          <span>Status: ${status}</span>
          <span>Total: RS. ${gtotal}</span>
        </div>
      `);
    }
  });
}

function closeReceipt() {
  $('.receipt_container').css('display', 'none');
   $('#blocker').css('display', 'none');
}
