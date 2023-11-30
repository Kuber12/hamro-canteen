<?php
session_start();


// Check if the session variable is set
if (!isset($_SESSION['fullName'])) {
    header("Location:../login.php");
    exit();
    
}
$_SESSION['validOTP']  = 'true';
include 'head.php';
?>
<link rel="stylesheet" href="profile.css">
<div class="container" >
    <div id="user-profile">
        <div>
            <span id="triangle"></span>
            <h2>Profile <i class="fa-solid fa-circle-arrow-left" id="close" onclick="navigateToPage()"></i></h2>
        </div>
        <div class="img-div">
            <img id = "profile-img" src="../assets/userImage/<?php echo $_SESSION['imageUrl']; ?>" alt="User Image">
        </div>
        <div id="info">
            <p id ='name'><?php echo $_SESSION['fullName']; ?></p>
            <button class ='update' onclick='editProfile()'>Edit Profile </button>
            <button class ='update' onclick='changePassword()'>Change Password </button>
            <p><span>Email: </span><span><?php echo $_SESSION['email']; ?></span></p>
            <p><span>Phone: </span><span><?php echo $_SESSION['phone']; ?></span></p>
            <p><span>Address: </span><span><?php echo $_SESSION['address']; ?></span></p>
            <p><span>Date of Birth: </span><span><?php echo $_SESSION['dob']; ?></span></p>
            <p><span><button class = "wallet" onclick = "toggleAmount('<?php echo $_SESSION['amount']; ?>')"><i class="fa-solid fa-wallet"></i> My Wallet </button></span><span class="actualAmount">XXXXXX</span></p>
        </div>
        <div id="triangle2"></div>
    </div>
     <div id="verify_user">
            <form id='verify'>
            <h2 class='title'>First Verify its you</h2>
            <label for='email' id ='emaillbl'>Enter your password</label><br>
            <input type='hidden' id ='email' name = 'email' value="<?php echo $_SESSION['email']; ?>" />
            <input type='password' id ='password' name = 'password' maxlength="12" required>
            <input  type="submit" id ='submit' value='Submit'>
            </form> 
            <div id = 'error'></div>
    </div><div id="verify_pass">
            <form id='changePassword'>
            <h2 class='title'>First Verify its you.</h2>
            <label for='email' >Enter your password</label><br>
            <input type='hidden' name = 'email' value="<?php echo $_SESSION['email']; ?>" />
            <input type='password'  name = 'password' maxlength="12" required>
            <input  type="submit" value='Submit'>
            </form> 
            <div id = "ERRORMSG"></div>
    </div>
</div>
<script src="../scripts/jquery.js"> </script>
<script>
    function navigateToPage() {
        window.location.href = "../index.php";
    }
    function editProfile(){
        $('#user-profile').hide();
        $('#verify_pass').hide();
        $('#verify_user').show();   

    }function changePassword(){
        $('#user-profile').hide();
        $('#verify_pass').show();
        $('#verify_user').hide();   

    }
    $('#verify').on('submit', function(event){
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url:'../phpactions/authentication.php',
            method : 'POST',
            data : formData,
            dataType: 'json',

            success:function(response){
                if (response === true){
                    // window.location = 'passwordReset.php';
                    window.location = '../profile/updateProfile.php';
                }else{
                    $('#error').text("Incorrect Password");
                }
            }
        })
    });
    $('#changePassword').on('submit', function(event){
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url:'../phpactions/authentication.php',
            method : 'POST',
            data : formData,
            dataType: 'json',

            success:function(response){
                if (response === true){
                    window.location = '../forgetPassword/passwordReset.php';
                    // window.location = 'updateProfile.php';
                }else{
                    $('#ERRORMSG').text("Incorrect Password");
                }
            }
        })
    });

    var amountVisible = false;

            // Function to toggle the amount display
            function toggleAmount(amount) {
                if (amountVisible) {
                    // If visible, hide the amount and show XXX
                    $('.actualAmount').text('XXXXXX');
                } else {
                    // If hidden, show the actual amount
                    // Replace this with your logic to get the actual amount
                    
                    $('.actualAmount').text("RS.  "  + amount);
                }

                // Toggle the state
                amountVisible = !amountVisible;
            }

 
</script>
<?php
include 'foot.php';
?>
