<?php
// Include database connection
include 'db_connect.php';

// Retrieve product ID from URL parameter or form data
$id = $_GET['id'];

// Delete product from database
$sql = "DELETE FROM products WHERE id=$id";
if(mysqli_query($conn, $sql)){
    echo "Product deleted successfully";
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
