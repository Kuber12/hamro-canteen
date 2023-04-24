let password = document.getElementById("myPassword");

let hidePassword = document.getElementById("hide-password");

let showPassword = document.getElementById("show-password");

showPassword.addEventListener("click", show);
hidePassword.addEventListener("click", hide);



function show() {
    
  password.type = "text";
  showPassword.style.display = "none";
  hidePassword.style.display = "inline";
  

  }
  function hide(){
    password.type = "password";
    showPassword.style.display = "inline";
    hidePassword.style.display = "none";
  }

  // validation 

 

  
  
  
