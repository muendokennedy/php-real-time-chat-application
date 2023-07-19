<?php

$conn = new mysqli("localhost", "root", "", "chat");

if(!$conn){
  die("Connection failed: " . $conn->connect_error);
}