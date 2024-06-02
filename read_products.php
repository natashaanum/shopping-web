<?php
// Include database connection
include 'db_connect.php';

// Fetch all products from database
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Display products
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Price: $" . $row["price"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close database connection
mysqli_close($conn);
?>
