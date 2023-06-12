<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST['remove-item'])){
    echo $_POST['foodName'];
   }
  
}