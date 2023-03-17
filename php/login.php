<?php
include('connection.php');
$db=$conn;

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

$mail = $_POST['mail'];
$pass = $_POST['pass'];


$stmt = $db->prepare("SELECT * FROM register WHERE email=?");
$stmt->bind_param("s",$mail);
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_row($result);
$val = $row[1];


echo strcmp($val,$pass);

$stmt->close();

$conn->close();
?>
