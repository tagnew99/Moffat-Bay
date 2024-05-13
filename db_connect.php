<?php
// Database connection parameters
$servername = "sql113.infinityfree.com"; // Database server
$username = "if0_36530284"; // Database username
$password = "ml10MKnGSM7qnB0"; // Database password
$database = "if0_36530284_MoffatBayLodge"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
