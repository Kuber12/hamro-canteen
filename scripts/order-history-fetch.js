// $(document).ready(function() {
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
            <td><button type = "submit" id = 'cancel_btn' onclick= cancel_order(${item["orderID"]}) >Cancel Order</button></td>
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
// });

function displayBill(event, orderDate, orderID, gtotal, payment, status) {
  $.ajax({
    url: './phpactions/generateBill.php',
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
        `
      }
      $(".receipt tbody").append(tmp);
      $("#receipt_container #footer").remove();
      // $("#receipt_container").append(`
      //   <div id="footer">
      //     <span>Payment: ${payment}</span>
      //     <span>Status: ${status}</span>
      //     <span>Total: RS. ${gtotal}</span>
      //   </div>
      // `);
      $("#receipt_container").append(`
          <div id="footer">
            <span>Payment: ${payment}</span>
            <span>Status: ${status}</span>
            <button id="downloadPDF" onclick="downloadAsPDF()">Download Receipt</button>
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
function cancel_order(id){


    $.ajax({
      url:'./phpactions/orderStatus.php',
      type:"POST",
      data:{'id': id},
      dataType :"json",


      success:function(response){
          if(response ===true){
          alert('Order cancelled successfully');
          location.reload();
      }else{
        alert('Error cancelling order!');
      }
    
        },
        error : function(){alert('Something went wrong')}

    })
}
function downloadAsPDF(){
  const content = $("#receipt_container")[0];
        
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
    pdf.save(`Hamro_Canteen${curid}`);
});
}