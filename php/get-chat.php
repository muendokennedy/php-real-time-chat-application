<?php 

session_start();

if(isset($_SESSION['unique_id'])){

  require_once "config.php";

  $outgoing_msg_id = mysqli_real_escape_string($conn, $_POST["outgoing_msg_id"]);
  $incoming_msg_id = mysqli_real_escape_string($conn, $_POST["incoming_msg_id"]);
  $message = mysqli_real_escape_string($conn, $_POST["message"]);

  $output = "";

  $sql = "SELECT * FROM messages
  LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
   WHERE (incoming_msg_id = $incoming_msg_id AND outgoing_msg_id = $outgoing_msg_id) OR (incoming_msg_id = $outgoing_msg_id AND outgoing_msg_id = $incoming_msg_id) ORDER BY msg_id;";

  $query = $conn->query($sql);

  if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      if($row["outgoing_msg_id"] === $outgoing_msg_id){ // Is a sender

        $output .= '<div class="chat outgoing">
                      <div class="details">
                        <p>'. $row["message"] .'</p>
                      </div>
                    </div>';
      } else{ // Is a receiver
        $output .= '<div class="chat incoming">
                      <img src="php/uploads/'.$row["img"].'" alt="incoming user">
                      <div class="details">
                        <p>'. $row["message"] .'</p>
                      </div>
                    </div>';
      }
    }
    echo $output;
  }

} else {
  header("Location: ../login.php");
}

