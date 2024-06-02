<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";  // Default password for XAMPP
$dbname = "user_database";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$payment = $_POST['payment'];
$cart = json_decode($_POST['cart'], true);

// Hash the password
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Prepare and bind user insertion
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $email, $hashed_pass);

// Execute user insertion
if ($stmt->execute()) {
    $userId = $stmt->insert_id;

    // Insert cart items
    foreach ($cart as $item) {
        $stmt = $conn->prepare("INSERT INTO orders (user_id, product_name, product_price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isdi", $userId, $item['productName'], $item['productPrice'], $item['quantity']);
        $stmt->execute();
    }

    // Implement payment processing logic here
    // For simplicity, we will assume payment is always successful

    echo "Checkout successful";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
