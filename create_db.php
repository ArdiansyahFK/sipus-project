<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'sipus_pgri';

// Create connection without database
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$conn->close();
