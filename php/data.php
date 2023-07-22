<?php

while($row = $sql->fetch_assoc()){
  $status = ($row["status"] == "Active now") ? ' ' : ' offline';

  $output .= '<a href="chat.php?user_id='. $row["unique_id"] .'">
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
?>