//to load items to dashboard page
$(document).ready(function() {
    // Make AJAX request
    $.ajax({
      url: './phpactions/menuItemsFetch.php', // URL of your PHP script
      method: 'GET', // or 'POST' depending on your PHP script
      dataType: 'json', // Expect JSON data in response
      success: function(response) {
        // Handle successful response
        console.log(response);

        // Display fetched data in HTML element
        $('#data-container').html(JSON.stringify(response));
      },
      error: function(xhr, status, error) {
        // Handle error response
        console.error(error);
      }
    });
  });
window.onload = function() {
    // const DATA_COUNT = 5;
    // const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

    // const data = {
    // labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
    // datasets: [
    //     {
    //     label: 'Dataset 1',
    //     data: Utils.numbers(NUMBER_CFG),
    //     backgroundColor: Object.values(Utils.CHART_COLORS),
    //     }
    // ]
    // };
    // const config = {
    //     type: 'pie',
    //     data: data,
    //     options: {
    //       responsive: true,
    //       plugins: {
    //         legend: {
    //           position: 'top',
    //         },
    //         title: {
    //           display: true,
    //           text: 'Chart.js Pie Chart'
    //         }
    //       }
    //     },
    //   };
    //   let myChart = new Chart($("#myChart"),config)
    //   let myOtherChart = new Chart($("#myOtherChart"),config)
}