<?php
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 $con = new mysqli("localhost","root","","login");
 if($con->connect_error){
    die("Failed to connect : " .$con->connect_error);
 }
 else{
    $stmt = $con->prepare("select * from login where USERNAME = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows>0){
              $data = $stmt_result->fetch_assoc(); 
              if($data['PASSWORD']===$password){
                echo "<h2>LOGIN succesfull</h2>";
                header('location:videos.html');
              }else{
                echo "<h2>Invalid Details</h2>";
            }
    }else{
        echo "<h2>Invalid Details</h2>";
    }
 }
?>