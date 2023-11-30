// import { jsPDF } from "https://cdn.skypack.dev/jspdf@2.3.1";
// import { html2canvas } from "https://cdn.skypack.dev/html2canvas@1.0.0-rc.7";
let curid;
$(document).ready(function() {
   
    $.ajax({
    url: './phpactions/transactionsFetch.php', 
    method: 'GET', 
    dataType: 'json',
    success: function(response) {
        
        fetchedResponse = response;
        response.forEach(item => {
            let markup = `
            <tr>
                <td>${item['orderedTime']}</td>
                <td>${item['orderID']}</td>
                <td>${item['fullName']}</td>;
                <td>${item['phone']}</td>
                <td>${item['payment']}</td>
                <td>${item['gtotal']}</td>
                <td>${item['status']}</td>
                

                <td><button class='view_btn' type="submit" onclick="displayBill(event, '${item['orderDate']}','${item['fullName']}', ${item["orderID"]}, ${item["gtotal"]}, '${item["payment"]}', '${item["status"]}')">View Receipt</button></td>
                <td><a href="./updateStatus-adminside.php?orderid=${item['orderID']}">Change Status</a></td>
            </tr>`;
            
            $('.styled-table tbody').append(markup);
        });
      

    },
    error: function(xhr, status, error) {
       
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
      dataType: "json",
      success: function(response) {
       
        $("#cName").text(`Name: ${fullName}`);
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

  function downloadAsPDF(){
    
    const content = $("#receipt_container")[0];
        
  
    html2canvas(content, { scale: 2 }).then(canvas => {
      const imgData = canvas.toDataURL("image/png");
      const pdf = new jsPDF();
  
      const pdfWidth = pdf.internal.pageSize.getWidth();
      const pdfHeight = pdf.internal.pageSize.getHeight();
      
 
      const imgAspectRatio = canvas.width / canvas.height;
  
   
      let imgWidth = pdfWidth;
      let imgHeight = pdfWidth / imgAspectRatio;
  
      if (imgHeight > pdfHeight) {
          imgHeight = pdfHeight;
          imgWidth = pdfHeight * imgAspectRatio;
      }
  

      pdf.addImage(imgData, "PNG", (pdfWidth - imgWidth) / 2, (pdfHeight - imgHeight) / 2, imgWidth, imgHeight);

      pdf.save(`Hamro_Canteen${curid}`);
  });
  
  }
  function closeReceipt() {
    $('.receipt_container').hide();
    $('.blockerr').hide();
  }
  