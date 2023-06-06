$(document).ready(function() {
    $('#search').on('keyup', function() {
      var query = $(this).val();
  
      $.ajax({
        url: './phpactions/itemSearch.php',
        method: 'GET',
        data: { query: query },
        success: function(response) {
          var response = JSON.parse(response);
          $('.styled-table tr:not(:first)').remove();
          response.forEach(item => {
            var daysAvailable = [item['avlblSun'],item["avlblMon"],item["avlblTue"],item["avlblWed"],item["avlblThu"],item["avlblFri"]];
            let markup = `
            <tr>
                <td>${item['itemID']}</td>
                <td class="dashboard-items-td"><img class="dashboard-items-img" src= "assets/itemimage/${item['itemImg']}"</td>
                <td>${item['itemName']}</td>
                <td>${item['itemPrice']}</td>`;
            for (const i of daysAvailable) {
                if(i==1){
                    markup+= `<td><img src="./assets/tick.png" alt="available" style="width:20px;"></td>`;
                }else{
                    markup+= `<td><img src="./assets/cross-mark.png" alt="not available" style="width:16px;"></td>`;
                }
            }
            markup+=
                `<td><button value=${item['itemID']} class="item-edit-btn">Edit</button></td>
            </tr>`;
            
            $('table tbody').append(markup);
          });
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
  