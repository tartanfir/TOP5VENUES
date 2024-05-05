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

// Fetch venue categories from the database
$sql = "SELECT * FROM venue_categories";
$result = $conn->query($sql);
$categories = array();
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

// Output categories as JSON
header('Content-Type: application/json');
echo json_encode($categories);
$conn->close();
?>
