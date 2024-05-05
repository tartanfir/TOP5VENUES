<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$data = json_decode(file_get_contents('php://input'), true);
$category = $data['category'];
$venueName = $data['venueName'];

// Insert into user_reviews table
$sql = "INSERT INTO user_reviews (venue_name, venue_category, date_of_input) VALUES (?, ?, CURDATE())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $venueName, $category);
$stmt->execute();
$stmt->close();
$conn->close();
?>
