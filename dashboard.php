<?php
    include './layout/head.php';
    include './layout/admin-sidebar.php';
    require './phpactions/adminVerification.php';
?>
<!-- chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="dashboard-container">
  <div class="dashboard-middle-container">
    <div class="dashboard-middle-container-top">
      <div class="hello-admin">
        <p>Hello {admin}</p>
      </div>
      <div class="canteen-status status-active">
        <p class="canteen-active-now-message">
          <i class="fa-solid fa-circle status-circle"></i>Active now
        </p>
      </div>
    </div>
    <div class="dashboard-heading">
      <h2 class="dashboard-heading-text">Today's Menu</h2>
      <button id="update-item-btn" onclick="location.href = './menuitem.php'">Update Menu</button>
    </div>
    <div class="dashboard-grid-container"> 
      <!-- dynamically added here -->
    </div> 
  </div>
  <div class="dashboard-sidebar-right">
    <h2>Popular Right Now</h2>
    <!-- Temporary code -->
    <!-- <div class="pie">
      <span class="message">We are still working on it</span>
    </div> -->
    <canvas id="my-pie-chart"></canvas>
    <h2>Sales Overview</h2>
    <div style="height:300px">
      <canvas id="my-line-chart" "></canvas>
    </div>
    
  </div>
    <style>
      .pie {
        height:300px;
        background-image: url('./assets/piechart.jpeg');
        background-size: contain;
        background-repeat:no-repeat;
        position: relative;
      }

      .message {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 18px;
        color: white;
        background-color: rgba(0, 0, 0, 0.8);
        padding: 10px 20px;
      }

      .pie:hover .message {
        display: block;
      }
    </style>
    

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
              <span>Rs ${response[i]["itemPrice"]}</span>
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