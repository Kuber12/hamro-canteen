import { jsPDF } from "https://cdn.skypack.dev/jspdf@2.3.1";
import html2canvas from "https://cdn.skypack.dev/html2canvas@1.0.0-rc.7";
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
        }
        );
      } else {
        console.log("Invalid response format:", response);
      }
      $(".orders").append(`</table></div>`);
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
    dataType: "json", // Add this line to parse the response as JSON
    success: function(response) {
      $("#odate").text(`Order Date: ${orderDate}`);
      $("#orderID").text(`Order ID: ${orderID}`);
           $(".receipt").append(``);
      for (let i = 0; i < response.length; i++) {
        const order = response[i];
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
      $("#fitems").append(`</tbody></table>
        <div id="footer">
          <span>Payment: ${payment}</span>
          <span>Status: ${status}</span>
          <span>Total: RS. ${gtotal}</span>
        </div>
      `);
    },
    error: function(xhr, status, error) {
      console.log("AJAX error:", error);
    }
  });
  $('.receipt_container').show();
  $('#blockerr').show();
}

function closeReceipt() {
  $('.receipt_container').hide();
  $('#blockerr').hide();
}

function downloadAsPDF(){
  const content = $("#receipt_container")[0];
      
  // Convert the content to an image using html2canvas
  html2canvas(content).then(canvas => {
    const imgData = canvas.toDataURL("image/png");
    const pdf = new jsPDF();
    
    // Add the image to the PDF
    pdf.addImage(imgData, "PNG", 0, 0, pdf.internal.pageSize.getWidth(), pdf.internal.pageSize.getHeight());

    // Download the PDF
    pdf.save("converted.pdf");
});
}