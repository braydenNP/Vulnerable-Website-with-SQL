<?php

$conn = new mysqli("localhost", "phpuser", "", "testdb");
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$result = $conn->query("SELECT description FROM products");

if ($result->num_rows > 0){
    echo "<ul>";
    while($row = $result->fetch_assoc()){
        echo "<li>" . htmlspecialchars($row['description']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "No products found";
}

$conn->close();
?>
