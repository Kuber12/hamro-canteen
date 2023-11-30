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
      url: '/test1/admin/phpactions/transactionSearch.php',
      method: 'GET',
      dataType: 'json',
      data: { 
        query: query ,
        orderby: orderby,
        sortby: sortby,
      },
      success: function(response) {
      
      
        $('.styled-table tr:not(:first)').remove();
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
          // Display fetched data in HTML element

      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
  
});