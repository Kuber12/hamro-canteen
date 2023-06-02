
function validateForm() {
  // var firstName = document.getElementById("first_name").value;
  // var lastName = document.getElementById("last_name").value;
  // var middleName = document.getElementById("middle_name").value;
  // var username = document.getElementById("username").value;
  // var gender = document.getElementById("gender").value;
  // var contact = document.getElementById("contact").value;
  // var email = document.getElementById("email").value;
  // var address = document.getElementById("address").value;
  // var password = document.getElementById("password").value;
  // var confirm_password = document.getElementById("confirm_password").value;
  var file  = document.getElementById("myFile").value;

  if(firstName==""  ||lastName == ""||middleName == ""||username == ""||gender == "" ||contact == ""||email == ""
                    ||address == ""||password == ""||confirm_password == "") {
                    alert("Please fill all the fields");

                      if (password != confirm_password) {
                        alert("Password and Confirm Password does not match");
                        return false;
                        }
                        if (password.length < 6) {
                          alert("Password must be at least 6 characters");

                          return false;
                          }
                          if (password.length > 20) {
                            alert("Password must be less than 20 characters");
                            return false;
                            }
                            if (password.match(/[a-z]/) == null) {
                              alert("Password must contain at least one lowercase letter");
                              return false;
                              }
                              if (password.match(/[A-Z]/) == null) {
                                alert("Password must contain at least one uppercase letter");
                                return false;
                                }
                                if (password.match(/[0-9]/) == null) {
                                  alert("Password must contain at least one numeric digit");
                                  return false;
                                  }
                                  if (password.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/) == null) {
                                    alert("Password Should contain at least one special Character");
                                    return false;
                                  }
                                 
                                    if (file.match(/.(jpg|png|jpeg|gif)$/) == null) {
                                      alert("File Type Should be jpg, png, jpeg, gif");
                                      return false;
                                      }
                                     

                            return true;
                            }
}