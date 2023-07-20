<?php
session_start();


// Check if the session variable is set
if (!isset($_SESSION['fullName'])) {

    header("location:login.php");
    exit();
}

include './layout/head.php';

?>
<link rel="stylesheet" href="./styles/help.css">
<link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <header>
    <h2><i class="fa-solid fa-circle-arrow-left" style = "margin-right:20px;" onclick="navigateToPage()"></i>Hamro Canteen Help Page</h2>
  </header>
  <main>
    <section>
        <div id="help">
    <h4>How can we help you?</h4>
    <form id ="issueForm" >
      <div class ="inputHolder">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" placeholder="Describe your issue" name ="customer_issue">
      
      </div>


 
</form>
</div>
      <h3>Placing an Order</h3>
      <p>To place an order on our website, follow these steps:</p>
      <ol>
        <li>Select the items you want to order and add them to your cart.</li>
        <li>Click on the "Cart" icon in the top right corner of the page.</li>
        <li>Review your order and click on the "Checkout" button.</li>
        <!-- <li>Fill out the order form with your information and click on the "Place Order" button.</li> -->
      </ol>
    </section>
    <section>
      <h3>Contact Us</h3>
      <p>If you have any questions or issues, please contact our customer service team:</p>
      <ul>
        <li>Email: hamrocanteen@gmail.com</li>
        <li>Phone: 01-4277456</li>
      </ul>
    </section>
  </main>
  <footer>
    <p>&copy; 2023 Canteen Website. All rights reserved.</p>
  </footer>
  <script src="./scripts/jquery.js"></script>
  <script>
    $(document).ready(function(){
      $('#issueForm').on('submit', function(event){
        
      event.preventDefault();
      var formdata = $('#issueForm').serialize();
      $.ajax({
        type:'GET',
        url: './phpactions/helpProcess.php',
        data:formdata,
        success:function(response){
          alert("your Issue added successfully");

        }
        

      });
    }
    )}
    );
  function navigateToPage() {
  window.location.href = "index.php";
}
  </script>
    <?php include './layout/foot.php'; ?>