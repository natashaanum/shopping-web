<?php
// Include database connection
include 'db_connect.php';

// Retrieve form data
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

// Insert data into database
$sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
if(mysqli_query($conn, $sql)){
    echo "Product created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
