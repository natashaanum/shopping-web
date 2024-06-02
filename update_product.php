<?php
// Include database connection
include 'db_connect.php';

// Retrieve form data
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

// Update product in database
$sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id=$id";
if(mysqli_query($conn, $sql)){
    echo "Product updated successfully";
} else {
    echo "Error updating product: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
