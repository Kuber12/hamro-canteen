
<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$password ="";
$dbname = "hamro_canteen";

try{
// create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);

}
catch(Exception){

  echo "database connection error" ;
  
  exit();
}