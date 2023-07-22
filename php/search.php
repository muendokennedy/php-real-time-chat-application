<?php

require_once "config.php";

$searchTerm = mysqli_real_escape_string($conn, $_POST["searchTerm"]);
$output = "";
$sql = $conn->query("SELECT * FROM users WHERE fname LIKE '%$searchTerm%' OR lname LIKE '%$searchTerm%';");

if($sql->num_rows > 0){
  require_once "data.php"  ;
} else {
  $output .= "No user found";
}

echo $output;