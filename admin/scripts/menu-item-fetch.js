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
            var daysAvailable = [item['avlblSun'],item["avlblMon"],item["avlblTue"],item["avlblWed"],item["avlblThu"],item["avlblFri"]];
            let markup = `
            <tr>
                <td>${item['itemID']}</td>
                <td class="dashboard-items-td"><img class="dashboard-items-img" src= "../assets/itemimage/${item['itemImg']}"</td>
                <td>${item['itemName']}</td>
                <td>${item['itemPrice']}</td>`;
            for (const i of daysAvailable) {
                if(i==1){
                    markup+= `<td><img src="../assets/tick.png" alt="available" style="width:20px;"></td>`;
                }else{
                    markup+= `<td><img src="../assets/cross-mark.png" alt="not available" style="width:16px;"></td>`;
                }
            }
            markup+=
                `<td><button value=${item['itemID']} class="item-edit-btn">Edit</button></td>
                <td><button class="item-delete-btn" onclick="window.location.href = './phpactions/deleteItem.php?itemID=${item['itemID']}';">Delete</button></td>
            </tr>`;
            
            $('table tbody').append(markup);
        });

    },
    error: function(xhr, status, error) {
        // Handle error response
        console.error(error);
    }
    });
});