<?php
session_start();

require_once "config.php";

$sql = $conn->query("SELECT * FROM users;");

$output = "";

if($sql->num_rows == 1){
  $output .= "No users available to chat";
}else{
  while($row = $sql->fetch_assoc()){
    $status = ($row["status"] == "Active now") ? ' ' : ' offline';

    $output .= '<a href="#">
                  <div class="content">
                    <img src="php/uploads/'. $row["img"] .'" alt="The first user">
                    <div class="details">
                      <span>'.$row["fname"] . " " .  $row["lname"].'</span>
                      <p>This is a test message</p>
                    </div>
                  </div>
                  <div class="status-dot'. $status .'"><i class="fas fa-circle"></i></div>
                </a>';
  }
}
echo $output;