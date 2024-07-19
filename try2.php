<?php
$NAME = $_POST['NAME'];
$USERNAME = $_POST['USERNAME'];
$PASSWORD = $_POST['PASSWORD'];

$con = new mysqli("localhost","root","","login");
if($con->connect_error){
   die('Failed to connect : '.$con->connect_error);
}else{
   $stmt = $con->prepare("Insert into login(NAME,USERNAME,PASSWORD) values(?,?,?)");
   $stmt->bind_param("sss",$NAME, $USERNAME, $PASSWORD);
   $stmt->execute();
   echo "Done";
   $stmt->close();
   header('location:videos.html');
}

?>
