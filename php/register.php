
<?php

// Establish MySQL connection (Replace placeholders with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "Shri@2023";
$dbname = "GUVI";

$conn =new mysqli($servername, $username,$password, $dbname,"3307","TCP");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Retrieve signup data sent via AJAX
if(isset($_POST['name'])){
$name = $_POST['name']; // Assuming 'username' is a field in your signup form
 $email = $_POST['email']; // Assuming 'email' is a field in your signup form
 $password = $_POST['password']; // Assuming 'password' is a field in your signup form
 $rollno = $_POST['rollno']; 




    $stmt = $conn->prepare("INSERT INTO users (rollno,username, email, pass) VALUES ( ?, ?, ?, ?)");
$stmt->bind_param("isss",$rollno, $name, $email, $password);

$stmt->execute();
   


   

$stmt->close();

}


$conn->close();
?>