let piechartfetcheddata;
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
  $.ajax({
    url: './phpactions/getPieChartData.php', // URL of your PHP script
    method: 'GET', // or 'POST' depending on your PHP script
    dataType: 'json', // Expect JSON data in response
    success: function(response) {
      piechartfetcheddata = response;
      // for pie chart 
        var piedata = {
          labels: piechartfetcheddata.map(item => item.foodName),
          datasets: [{
              data: piechartfetcheddata.map(item => item.total_quantity),
              backgroundColor:generateRandomColors(piechartfetcheddata.length)
          }]
      }; 
      var ctx = document.getElementById("my-pie-chart").getContext("2d");
      var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: piedata,
      options: {
          
      }
      });
    },
    error: function(xhr, status, error) {
        // Handle error response
        console.error(error);
    }
    });  
  

    // for line chart
    var ctx2 = document.getElementById("my-line-chart").getContext("2d");
    const ch = new Chart(ctx2, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
          label: 'Data',
          data: [10, 20, 15, 25, 30, 20],
          borderColor: 'blue',
          fill: false
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
    
    
}

// Function to generate a random color
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

// Function to generate a list of random colors
function generateRandomColors(numColors) {
  var colors = [];
  for (var i = 0; i < numColors; i++) {
    var randomColor = getRandomColor();
    colors.push(randomColor);
  }
  return colors;
}