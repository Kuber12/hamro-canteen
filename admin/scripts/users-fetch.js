$(document).ready(function() {
    // Make AJAX request
    $.ajax({
    url: './phpactions/usersFetch.php', // URL of your PHP script
    method: 'GET', // or 'POST' depending on your PHP script
    dataType: 'json', // Expect JSON data in response
    success: function(response) {
        // Handle successful response
        fetchedResponse = response;
        let i=0;
        response.forEach(item => {
            let markup = `
            <tr>
                <td>${item['userID']}</td>
                <td>${item['fullName']}</td>;
                <td>${item['email']}</td>
                <td>${item['phone']}</td>
                <td class="dashboard-items-td"><img class="dashboard-items-img" src= "../assets/userImage/${item['imageUrl']}"</td>
                <td>
                <form action = "../wallet/depositeForm.php" method = "POST">
                <input type = "hidden" value = "${item['email']}" name = "user_email" />
                 <button  class="item-edit-btn"><i class="fa-solid fa-wallet"></i> Load Wallet</button>
                </form> </td>           
                <td><button class="item-delete-btn" onclick="window.location.href = './phpactions/deleteUser.php?email=${item['email']}';">Delete</button></td>
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