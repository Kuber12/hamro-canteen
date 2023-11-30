$(document).ready(function() {
  
  $.ajax({
    url: "orderFetch.php",
    type: "POST",
    dataType: "json",
    success: function(response) {
      if (Array.isArray(response)) {
        fetchedResponse = response;
        response.forEach((item) => {
          // Start row
          $(".orders").append(`<tr> 
            <td>${item["orderedTime"]}</td>
            <td>${item["orderID"]}</td>
            <td>${item["gtotal"]}</td>
            <td>${item["payment"]}</td>
            <td>${item["status"]}</td>
            <td><button class='view_btn' type="submit" onclick="displayBill(event, '${item['orderedTime']}', ${item["orderID"]}, ${item["gtotal"]}, '${item["payment"]}', '${item["status"]}')">View Receipt</button></td>
          `);

          if (item["status"] === "pending") {
            // Generate the "Cancel Order" button in the same row
            $(".orders tr:last-child").append(`
              <td><button type="submit" id="cancel_btn" onclick="cancel_order(${item["orderID"]})">Cancel Order</button></td>
            `);
          } else {
            // If the order status is not "pending", add an empty cell in the same row
            $(".orders tr:last-child").append(`<td><button id = "cancel-disabled" disabled>cancel order</button></td>`);
          }

          // End row
          $(".orders").append(`</tr>`);
        });

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
    url: 'generateBill.php',
    type: "POST",
    data: {
      orderID: orderID,
    },
    dataType: "json", // Add this line to parse the response as JSON
    success: function(response) {
      console.log(response);
      $("#odate").text(`Order Date: ${orderDate}`);
      $("#orderID").text(`Order ID: ${orderID}`);
      let tmp;
      curid = orderID;
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
        `;
      }
      $(".receipt tbody").append(tmp);
      $("#receipt_container #footer").remove();
  
      $("#receipt_container").append(`
          <div id="footer">
            <span>Payment: ${payment}</span>
            <span>Status: ${status}</span>
            <button id="downloadPDF" onclick='downloadAsPDF()'>Download Receipt</button>
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

function cancel_order(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes! Cancel Order'
  }).then((result) => {
    if (result.isConfirmed) { 
      $.ajax({
        url: './phpactions/updateOrderCanceled.php', // Updated URL
        type: "POST",
        data: { 'id': id },
        dataType: 'json', // Update to text dataType
        success: function(response) {
          if (response ==true) {
            Swal.fire(
              'Canceled!',
              'Your order has been canceled.',
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            });
          } else {
            Swal.fire('Oops...', 'Error already Placed!', 'error');
            location.reload();

          }
        },
        error : function(){alert('Something went wrong')}

    })
}});
}
function downloadAsPDF(){

  const content = $("#receipt_container")[0];
  document.getElementById("downloadPDF").style.display ="none";
  document.getElementById("close_receipt").style.display ="none";
        
  // Convert the content to an image using html2canvas
  html2canvas(content, { scale: 2 }).then(canvas => {

    const imgData = canvas.toDataURL("image/png");
    const pdf = new jsPDF();

    const pdfWidth = pdf.internal.pageSize.getWidth();
    const pdfHeight = pdf.internal.pageSize.getHeight();
    
    // Calculate the aspect ratio of the captured image
    const imgAspectRatio = canvas.width / canvas.height;

    // Calculate the dimensions of the image in the PDF while preserving aspect ratio
    let imgWidth = pdfWidth;
    let imgHeight = pdfWidth / imgAspectRatio;

    if (imgHeight > pdfHeight) {
        imgHeight = pdfHeight;
        imgWidth = pdfHeight * imgAspectRatio;
    }

    // Add the image to the PDF
    pdf.addImage(imgData, "PNG", (pdfWidth - imgWidth) / 2, (pdfHeight - imgHeight) / 2, imgWidth, imgHeight);

    // Download the PDF
    pdf.save(`Order_receipt${curid}`);
});
}