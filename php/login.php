<?php


$servername = "localhost";
$username = "root";
$password = "Shri@2023";
$dbname = "GUVI";

$conn =new mysqli($servername, $username,$password, $dbname,"3307","TCP");

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Retrieve login form data using POST method
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($_POST['name']) && isset($_POST['password'])){
    $name = $_POST['name']; // Assuming 'username' is a field in your signup form
     $email = $_POST['email']; // Assuming 'email' is a field in your signup form
     $password = $_POST['password']; // Assuming 'password' is a field in your signup form
     $rollno = $_POST['rollno']; 
     // Prepare and bind the statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (rollno,username, email, pass) VALUES ( ?, ?, ?,?)");
    $stmt->bind_param("isss",$rollno, $name, $email, $password);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
       
    
        echo "<div class='alert alert-success'>success</div>";
    
    } 
    }

// SQL query to fetch user data based on email
$stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    // Successful login
    $_SESSION['user_id'] = $user['id']; // Store user ID in session for further use
    echo "Login successful"; // You can redirect or perform other actions after successful login
} else {
    // Invalid credentials
    echo "Invalid email or password";
}

$stmt->close();
$conn->close();
?>