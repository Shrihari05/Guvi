<?php


$servername = "localhost";
$username = "root";
$password = "Shri@2023";
$dbname = "GUVI";

$conn =new mysqli($servername, $username,$password, $dbname,"3307","TCP");


if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];

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


$stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
   
   
    echo "Login successful"; 
} else {
    
    echo "Invalid email or password";
}

$stmt->close();
$conn->close();
?>