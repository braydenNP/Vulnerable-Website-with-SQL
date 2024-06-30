<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    	    
    $id = $_GET['id'];

    // Debug: Output the retrieved ID
    echo "Retrieved ID: $id<br>";

    // Database Connection
    $conn = new mysqli("localhost", "phpuser", "", "testdb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insecure SQL query
    $query = "SELECT description FROM products WHERE id = $id";

    // Debug: Output the SQL query
    //echo "Running query: $query<br>";

    $result = $conn->query($query);

    // Check if the product was found and display it
    if ($row = $result->fetch_assoc()) {
        echo "Product Description: " . htmlspecialchars($row['description']);
    } else {
        echo "No product found with ID: " . htmlspecialchars($id);
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request method or missing ID.";
}
?>
