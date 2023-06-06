$(document).ready(function() {
    $('#search').on('keyup', function() {
      var query = $(this).val();
  
      $.ajax({
        url: './phpactions/userSearch.php',
        method: 'GET',
        data: { query: query },
        success: function(response) {
          var response = JSON.parse(response);
          $('.styled-table tr:not(:first)').remove();
            response.forEach(item => {
                let markup = `
                <tr>
                    <td>${item['userID']}</td>
                    <td>${item['username']}</td>
                    <td>${item['fullName']}</td>;
                    <td>${item['email']}</td>
                    <td>${item['phone']}</td>
                    <td class="dashboard-items-td"><img class="dashboard-items-img" src= "assets/userImage/${item['imageUrl']}"</td>`;
                markup+=
                    `<td><button value=${item['itemID']} class="item-edit-btn">Edit</button></td>
                </tr>`;
                
                $('table tbody').append(markup);
            });
            // Display fetched data in HTML element

        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
  