<?php 

session_start();

if(isset($_SESSION['unique_id'])){

  require_once "config.php";

  $outgoing_msg_id = mysqli_real_escape_string($conn, $_POST["outgoing_msg_id"]);
  $incoming_msg_id = mysqli_real_escape_string($conn, $_POST["incoming_msg_id"]);
  $message = mysqli_real_escape_string($conn, $_POST["message"]);


  if(!empty($message)){
    $sql = $conn->query("INSERT INTO messages(incoming_msg_id,outgoing_msg_id,message) VALUES('$incoming_msg_id', '$outgoing_msg_id', '$message')") or die();
  }

} else {
  header("Location: ../login.php");
}

