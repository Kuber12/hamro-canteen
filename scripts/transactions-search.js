$(document).ready(function() {
  $('#search').on('keyup', searchExecute);
  $('#orderby').on('click', searchExecute);
  let sortby = "desc";
  $('#sort-by').on('click',function(){
    if (sortby === "asc"){
      sortby = "desc";
    }else if(sortby === "desc"){
      sortby = "asc";
    }
    searchExecute();
  });
  function searchExecute(){
    let query = $('#search').val();
    let orderby = $('#orderby').val();
    query = $('#search').val();
    orderby = $('#order-by').val(); 
    $.ajax({  
      url: './phpactions/transactionSearch.php',
      method: 'GET',
      data: { 
        query: query ,
        orderby: orderby,
        sortby: sortby,
      },
      success: function(response) {
        console.log(response);
        var response = JSON.parse(response);
        $('.styled-table tr:not(:first)').remove();
          response.forEach(item => {
            let markup = `
            <tr>
                <td>${item['orderDate']}</td>
                <td>${item['orderID']}</td>
                <td>${item['fullName']}</td>;
                <td>${item['phone']}</td>
                <td>${item['payment']}</td>
                <td>${item['gtotal']}</td>
                <td>${item['status']}</td>
                <td><button class='view_btn' type="submit" onclick="displayBill(event, '${item['orderDate']}','${item['fullName']}', ${item["orderID"]}, ${item["gtotal"]}, '${item["payment"]}', '${item["status"]}')">View Receipt</button></td>
            </tr>`;
            
            $('.styled-table tbody').append(markup);
          });
          // Display fetched data in HTML element

      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
  
});