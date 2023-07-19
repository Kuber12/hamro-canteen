<?php
session_start();

// Check if the session variable is set
if (!isset($_SESSION['fullName'])) {
    header("Location: login.php");
    exit();
}

include './layout/head.php';
?>
<link rel="stylesheet" href="./styles/profile.css">
<div class="container" >
    <div id="user-profile">
        <div>
            <span id="triangle"></span>
            <h2>Profile <i class="fa-solid fa-circle-arrow-left" id="close" onclick="navigateToPage()"></i></h2>
        </div>
    
        <img src="./assets/userImage/<?php echo $_SESSION['imageUrl']; ?>" alt="User Image">
        <div id="info">
            <p id ='name'><?php echo $_SESSION['fullName']; ?></p>
            <button id ='update' onclick='editProfile()'>Edit Profile </button>
            <p><span>Email: </span><span><?php echo $_SESSION['email']; ?></span></p>
            <p><span>Phone: </span><span><?php echo $_SESSION['phone']; ?></span></p>
            <p><span>Address: </span><span><?php echo $_SESSION['address']; ?></span></p>
            <p><span>Date of Birth: </span><span><?php echo $_SESSION['dob']; ?></span></p>
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
    </div>
</div>
<script>
    function navigateToPage() {
        window.location.href = "index.php";
    }
    function editProfile(){
        $('#user-profile').hide();
        $('#verify_user').show();
    }
    $('#verify').on('submit', function(event){
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url:'./phpactions/authentication.php',
            method : 'POST',
            data : formData,
            dataType: 'json',

            success:function(response){
                if (response === true){
                    window.location = 'updateProfile.php';
                }else{
                    $('#error').text("Incorrect Password");
                }
            }
        })
    });
</script>
<?php
include './layout/foot.php';
?>
