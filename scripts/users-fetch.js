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
                <td class="dashboard-items-td"><img class="dashboard-items-img" src= "assets/userImage/${item['imageUrl']}"</td></tr>`;
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