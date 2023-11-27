<?php


$servername = "localhost";
$username = "root";
$password = "Shri@2023";
$dbname = "GUVI";

$conn =new mysqli($servername, $username,$password, $dbname,"3307","TCP");


if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}



if(isset($_POST['name']) && isset($_POST['password'])){
    $name = $_POST['name']; 
     $email = $_POST['email']; 
     $password = $_POST['password']; 
     $rollno = $_POST['rollno']; 

    $stmt = $conn->prepare("INSERT INTO users (rollno,username, email, pass) VALUES ( ?, ?, ?,?)");
    $stmt->bind_param("isss",$rollno, $name, $email, $password);
    
   
    if ($stmt->execute()) {
       
    
        echo "<div class='alert alert-success'>success</div>";
    
    } 
    }




$stmt->close();
$conn->close();
?>