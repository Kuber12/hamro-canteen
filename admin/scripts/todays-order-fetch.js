$(document).ready(function() {
    $.ajax({
    url: './phpactions/todaysOrderFetch.php', 
    method: 'GET', 
    dataType: 'json',
    success: function(response) {
        fetchedResponse = response;
        let i=1;
        response.forEach(item => {
            let markup = `
            <tr>
                <td>${i++}</td>
                <td>${item['foodName']}</td>
                <td>${item['totalQuantity']}</td>
            </tr>`;
            $('.styled-table tbody').append(markup);
        });
      

    },
    error: function(xhr, status, error) {
       
        console.error(error);
    }
    });
}); 
  