<?php

session_start();

if(isset($_SESSION["unique_id"])){

  require_once "php/config.php";
  // Update the user with offline status once they log out
  $sql = $conn->query("UPDATE users SET status = 'Offline' WHERE unique_id = {$_GET['user_id']};");

  if($sql){
    session_unset();

    session_destroy();
  }
  header("Location: login.php");
} else {
  header("Location: login.php");
}