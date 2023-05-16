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
      <div class="dashboard-grid-item hello">
        <img class="dashboard-item-image" src="assets/item.png" alt="item">
        <div class="item-name-n-price">
          <span>Momo</span>
          <span>$10.00</span>
        </div>
      </div>
      <div class="dashboard-grid-item">
        <img class="dashboard-item-image" src="assets/item.png" alt="item">
        <div class="item-name-n-price">
          <span>Momo</span>
          <span>$10.00</span>
        </div>
      </div>
      <div class="dashboard-grid-item">
      <img class="dashboard-item-image" src="assets/item.png" alt="item">
        <div class="item-name-n-price">
          <span>Momo</span>
          <span>$10.00</span>
        </div>
      </div>
      <div class="dashboard-grid-item">4</div>
      <div class="dashboard-grid-item">5</div>
      <div class="dashboard-grid-item">6</div>
      <div class="dashboard-grid-item">7</div>
      <div class="dashboard-grid-item">8</div>
      <div class="dashboard-grid-item">9</div>
    </div> 
  </div>
  <div class="dashboard-sidebar-right">
    <h2>Popular Right now</h2>
    <canvas id="myPieChart"></canvas>
    <h2>Popular Right now</h2>
    <canvas id="myLineChart"></canvas>
  </div>
</div>
<script src="./scripts/dashboard-script.js"></script>
<?php
    include './layout/foot.php';
?>