<?php
    include './layout/head.php';
    include './layout/admin-sidebar.php';
    include './layout/admin-sidebar.php';
?>
<!-- chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="dashboard-container">
  <div class="dashboard-middle-container">
    <div class="dashboard-middle-container-top">
      <div class="hello-admin">
        <h3>Hello {admin}</h3>
        <p>how are you today?</p>
      </div>
      <div class="canteen-status status-active">
        <h3>Canteen Status</h3>
        <p class="canteen-active-now-message">
          <i class="fa-solid fa-circle status-circle"></i>Active now
        </p>
      </div>
    </div>
    <div class="today-menu-heading">
      <h2 class="todays-menu-text">Today's Menu</h2>
      <a href="http:/">Update Menu</a>
    </div>
    <div class="dashboard-grid-container"> 
      <!-- dynamically added here -->
    </div> 
  </div>
  <div class="dashboard-sidebar-right">
    <h2>Popular Right now</h2>
    <canvas id="popular-piechart"></canvas>
    <h2>Popular Right now</h2>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.js"></script>
<script src="./scripts/dashboard-script.js"></script>
<script>
  $(document).ready(function() {
    // Make AJAX request
    $.ajax({
      url: './phpactions/menuItemsFetch.php', // URL of your PHP script
      method: 'GET', // or 'POST' depending on your PHP script
      dataType: 'json', // Expect JSON data in response
      success: function(response) {
        for (let i = 0; i < response.length; i++) {
          let elem = `<div class="dashboard-grid-item">
            <img class="dashboard-item-image" src="assets/itemimage/${response[i]["itemImg"]}" alt="item">
            <div class="item-name-n-price">
              <span>${response[i]["itemName"]}</span>
              <span>${response[i]["itemPrice"]}</span>
            </div>
          </div>`;
          $(".dashboard-grid-container").append(elem);
        }
      },
      error: function(xhr, status, error) {
        // Handle error response
        console.error(error);
      }
    });
  });
</script>
<?php
    include './layout/foot.php';
?>