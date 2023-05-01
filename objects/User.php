<?php
class User {
  public $userID;
  public $name;
  public $password;
  public $email;
  public $phone;

  function __construct($userID, $name, $password, $email, $phone) {
    $this->userID = $userID;
    $this->name = $name;
    $this->password = $password;
    $this->email = $email;
    $this->phone = $phone;
  }

  function removeUser($userID){
    include("./phpactions/connections.php");
    mysqli_query($conn, "Delete FROM users where userID = ". $userID);
  }
  function addUser($userID){
    include("./phpactions/connections.php");
    mysqli_query($conn, "insert into users (userID,name,password,email,phone) value(".$userID.",".$name.",".$password.",".$email.",".$phone.");"}
}


  