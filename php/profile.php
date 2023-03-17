<?php
$mail=$_POST['mail'];
$pass=$_POST['pass'];

$connect = new MongoDB\Driver\Manager("mongodb+srv://nithyasrirk2701:nithya@cluster0.2ffwema.mongodb.net/test");
    
$filter = [ 'email' => $mail ]; 
$query = new MongoDB\Driver\Query($filter);     

$res = $connect->executeQuery('guvi.registerinfo', $query);


foreach($res as $document) {
    
    print_r($document);
}

?>