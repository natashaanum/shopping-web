<?php
// Database configuration
$servername = "http://localhost:8080";
$username = "username";
$password = "password";
$dbname = "ecommerce_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
