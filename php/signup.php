<?php

require_once "config.php";

session_start();

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pwd)){
  // Checking the validity of the email
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    // Checking whether the email already exists in the system
    $sql = $conn->query("SELECT email FROM users WHERE email = '{$email}';");

    if($sql->num_rows > 0){
      echo "email_unique";
    }else{
      // Checkinging for the file upload
      if(isset($_FILES["profile-pic"])){
        $img_name = $_FILES["profile-pic"]["name"];
        $file_type = $_FILES["profile-pic"]["type"];
        $img_temp_name = $_FILES["profile-pic"]["tmp_name"];

        // Get the extension of the uploMaded file
        $file_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

        $allow_ext = ['jpeg', 'jpg', 'png'];

        if(in_array($file_ext, $allow_ext)){
          $time = time();
          $new_img_name = $time . $img_name;

          if(move_uploaded_file($img_temp_name, "uploads/" . $new_img_name)){
            
            $status = "Active now"; // Once the user signs their status will turn into active

            $random_id = rand(time(), 10000000);

            $sql = "INSERT INTO users(unique_id, fname, lname, email, password, img, status) VALUES(?, ?, ?, ?, ?, ?, ?);";

            $stmt = $conn->prepare($sql);

            $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

            $stmt->bind_param("issssss", $random_id, $fname, $lname, $email, $hashed_pwd,  $new_img_name, $status);

            $stmt->execute();
          }
          // If the data is insert successfully start a session with the unique_id
          $sql = $conn->query("SELECT * FROM users WHERE email = '{$email}';");

          if($sql->num_rows > 0){

            $row = $sql->fetch_assoc();

            $_SESSION['unique_id'] = $row['unique_id'];

            echo "success";

          }

        } else {
          echo "file_invalid";
      } 

      } else {
        echo "required";
      }
    }

  } else{
    echo "email_valid";
  }
} else {
  echo "required";
}