<?php
session_start();

require_once "config.php";

$sql = $conn->query("SELECT * FROM users WHERE NOT unique_id = {$_SESSION['unique_id']};");

$output = "";

if($sql->num_rows == 0){
  $output .= "No users available to chat";
}else{
  require_once "data.php";
}
echo $output;