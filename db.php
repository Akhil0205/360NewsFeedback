<?php
$servername = "localhost";
$username = "root";
$password = "";

// First, create a connection without selecting a database
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS 360_feedback";
if ($conn->query($sql) === TRUE) {
    // Select the database
    $conn->select_db("360_feedback");
    
    // Create user1 table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS user1 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }
} else {
    die("Error creating database: " . $conn->error);
}
?>