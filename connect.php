<?php
// Database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "travels_bus";

// Create a database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
