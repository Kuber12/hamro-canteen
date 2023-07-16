$(document).ready(function() {
  let password = $("#myPassword");
  let hidePassword = $("#hide-password");
  let showPassword = $("#show-password");

  showPassword.on("click", show);
  hidePassword.on("click", hide);

  function show() {
    password.attr("type", "text");
    showPassword.hide();
    hidePassword.show();
  }

  function hide() {
    password.attr("type", "password");
    showPassword.show();
    hidePassword.hide();
  }


});
