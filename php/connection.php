<?php
//SQL CONNECTION
$conn = mysqli_connect("localhost", "root","","guvi"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>