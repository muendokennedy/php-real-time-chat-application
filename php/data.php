<?php
while($row = $sql->fetch_assoc()){

  // $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = $row['unique_id'] OR outgoing_msg_id = $row['unique_id']) AND (outgoing_msg_id = $outgoing_id OR outgoing_msg_id = $outgoing_id) ORDER BY msg_id DESC LIMIT 1";

  $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$_SESSION['unique_id']} OR incoming_msg_id = {$_SESSION['unique_id']}) ORDER BY msg_id DESC LIMIT 0, 1;";
  $query = $conn->query($sql2);
  if($query->num_rows > 0){
    $row2 = $query->fetch_assoc();
    $shortMessage = $row2['message'];
  } else{
    $shortMessage = "No messages available";
  }
  (strlen($shortMessage) > 28) ? $msg = substr($shortMessage, 0, 28) . "..." : $msg = $shortMessage;

  // Add a you text before a message that was send by the login id

  ($_SESSION['unique_id'] == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";

  $status = ($row["status"] == "Active now") ? ' ' : ' offline';

  $output .= '<a href="chat.php?user_id='. $row["unique_id"] .'">
                <div class="content">
                  <img src="php/uploads/'. $row["img"] .'" alt="The first user">
                  <div class="details">
                    <span>'.$row["fname"] . " " .  $row["lname"].'</span>
                    <p>'. $you . $msg .'</p>
                  </div>
                </div>
                <div class="status-dot'. $status .'"><i class="fas fa-circle"></i></div>
              </a>';
}
