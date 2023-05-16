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
    // for pie chart 
    var piedata = {
        labels: ["Label 1", "Label 2", "Label 3"],
        datasets: [{
            data: [30, 20, 50],
            backgroundColor: ["#ff6384", "#36a2eb", "#ffce56"]
        }]
    }; 
    var ctx = document.getElementById("myPieChart").getContext("2d");
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: piedata,
    options: {
        
    }
    });

    // for line chart
    const DATA_COUNT = 7;
    const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};

    const labels = Utils.months({count: 7});
    const linechartdata = {
    labels: labels,
    datasets: [
        {
        label: 'Dataset 1',
        data: Utils.numbers(NUMBER_CFG),
        borderColor: Utils.CHART_COLORS.red,
        backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
        },
        {
        label: 'Dataset 2',
        data: Utils.numbers(NUMBER_CFG),
        borderColor: Utils.CHART_COLORS.blue,
        backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
        }
    ]
    };
    var ctx = document.getElementById("myLineChart").getContext("2d");
    var myLineChart = new Chart(ctx,{
        type: 'line',
        data: linechartdata,
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Chart.js Line Chart'
            }
          }
        },
      });
}