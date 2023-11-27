<?php

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase('your_database_name');
$collection = $database->selectCollection('user_profiles');


$userID = $_SESSION['user_id']; 


$userProfile = $collection->findOne(['user_id' => $userID]);

if ($userProfile) {
    
    header('Content-Type: application/json');
    echo json_encode($userProfile);
} else {
    
    http_response_code(404);
    echo json_encode(array("message" => "User profile not found"));
}
?>