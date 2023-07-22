<?php
require_once "config.php";

session_start();

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

if(!empty($email) && !empty($pwd)){
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){

    $sql = $conn->query("SELECT * FROM users WHERE email = '{$email}';");

    if($sql->num_rows > 0){
      $row = $sql->fetch_assoc();
  
      if(password_verify($pwd, $row["password"])){

        $sql = $conn->query("UPDATE users SET status = 'Active now' WHERE unique_id = {$row['unique_id']};");

        // set a session variable with the unique key

        if($sql){
          
          $_SESSION['unique_id'] = $row['unique_id'];
          echo "success";
          
        }  
      } else {
        echo "incorrect_password";
      }
    } else{
      echo "incorrect_email";
    }

  }else{
    echo "email_valid";
  }
} else {
  echo "required";
}