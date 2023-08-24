$(document).ready(function() {
  let password = $("#myPassword");
  let hidePassword = $("#hide-password");
  let showPassword = $("#show-password");

  showPassword.on("click", show);
  hidePassword.on("click", hide);

  function show() {
    password.attr("type", "text");
    showPassword.hide();
    hidePassword.css("display", "inline");
  }

  function hide() {
    password.attr("type", "password");
    showPassword.show();
    hidePassword.hide();
  }


});
$('.login-form').on('submit',function(event){
  event.preventDefault();
  var formData = $(this).serialize();

  $.ajax({
      url : "./phpactions/authentication.php",
      type : 'POST',
      data : formData,
      dataType: 'json',

      success:function(response){
        if (response === true) {
     
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Login Successful',
            text: 'Welcome to your account.',
            showConfirmButton: false,
            timer: 1500,
          }).then(() => {
            window.location = "index.php";
          });
          
        
        }  else{
              var div  = document.getElementById("alert-incorrect");
              div.style.display = "block";
              setTimeout(function(){
              div.style.display = "none";
              }, 1500);
          }
      }
  })
})
