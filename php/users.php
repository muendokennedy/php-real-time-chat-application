<?php
session_start();

require_once "config.php";

$sql = $conn->query("SELECT * FROM users;");

$output = "";

if($sql->num_rows == 1){
  $output .= "No users available to chat";
}else{
  require_once "data.php";
}
echo $output;