$(document).ready(function(){
    displayAmt();
});

function displayAmt(){
    var email = $('#walletUserEmail').text();

    $.post("../wallet/balanceCheck.php", {
        email: email,
    },
    function(data, status){
        // Alert should be inside the callback function
        

        // Check if the status is "success" before updating the content
        if(status === "success"){
            data = JSON.parse(data);
            $(".actualAmount").text(data);
        }
    });
}


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

function toggleAmount(){
    $('.actualAmount').toggle();
}

