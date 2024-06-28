<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Ensure ID is treated as an integer
    $id = (int) $_GET['id'];

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
    echo "Running query: $query<br>";

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
