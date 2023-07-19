<?php

require_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
// $fname = mysqli_real_escape_string($conn, $_POST['profile-pic']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pwd)){
  // Checking the validity of the email
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    // Checking whether the email already exists in the system
    $sql = $conn->query("SELECT email FROM users WHERE email = '{$email}';");
    if($sql->num_rows > 0){
      echo "User with this email exists";
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
          move_uploaded_file($img_temp_name, "uploads/");
          $status = "Active now"; // Once the user signs their status will turn into active
        }else{
          echo "Please select an image file - jpg, jpeg or png";
        }
      } else {
        echo "Please select an image file";
      }
    }

  } else{
    echo "Enter a valid email";
  }
} else {
  echo "All input fields are required";
}