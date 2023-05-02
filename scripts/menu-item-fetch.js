$(document).ready(function() {
    // Make AJAX request
    $.ajax({
    url: './phpactions/menuItemsFetch.php', // URL of your PHP script
    method: 'GET', // or 'POST' depending on your PHP script
    dataType: 'json', // Expect JSON data in response
    success: function(response) {
        // Handle successful response
        fetchedResponse = response;
        response.forEach(item => {
            var daysAvailable = [item['avlblSun'],item["avlblMon"],item["avlblTue"],item["avlblWed"],item["avlblThurs"],item["avlblFri"]];
            let markup = `
            <tr>
                <td>${item['itemID']}</td>
                <td class="dashboard-items-td"><img class="dashboard-items-img" src= "assets/fooditems/${item['itemImg']}"</td>
                <td>${item['itemName']}</td>
                <td>${item['itemPrice']}</td>`;
            for (const i of daysAvailable) {
                if(i==1){
                    markup+= `<td><input type="checkbox" checked DISABLED></td>`;
                }else{
                    markup+= `<td><input type="checkbox" DISABLED></td>`;
                }
            }
            markup+=
                `<td><button value=${item['itemID']}>Edit</button></td>
            </tr>`;
            
            $('table tbody').append(markup);
        });
        // Display fetched data in HTML element

    },
    error: function(xhr, status, error) {
        // Handle error response
        console.error(error);
    }
    });
});