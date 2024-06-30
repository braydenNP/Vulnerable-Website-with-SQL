<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];

    $conn = new mysqli("localhost", "phpuser", "", "testdb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "INSERT INTO products (description) VALUES ('$description')";
    //echo "Running query: " . htmlspecialchars($query) . "<br>";
   
    if ($conn->query($query) === TRUE){
        echo "New product added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}
?>

