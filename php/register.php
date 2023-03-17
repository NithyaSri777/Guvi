<?php
include('connection.php');
$db=$conn;

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

//SQL PREPARED STATEMENTS
$stmt = $db->prepare("INSERT INTO register (email, password ) VALUES (?, ?)");
$stmt->bind_param("ss",$email,$password);


$email = $_POST['email'];
$password = $_POST['password'];

$stmt->execute();
$stmt->close();

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];


$conn->close();

//MONGODB CONNECTION
$connection = new MongoDB\Driver\Manager("mongodb+srv://nithyasrirk2701:nithya@cluster0.2ffwema.mongodb.net/test");

$insertdata= new MongoDB\Driver\BulkWrite;

$doc=['email'=>$email,'fname' => $fname , 'lname'=> $lname , 'dob'=>$dob,'phone'=>$phone];
$insertdata ->insert($doc);

$connection->executeBulkWrite('guvi.registerinfo',$insertdata);
?>