<?php
    //sudo nano /var/www/html/additem.php
    //itemdetails.php?itemID=15 INTO OUTFILE '/var/www/rce.php'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];

    $conn = new mysqli("localhost", "phpuser", "", "testdb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "INSERT INTO products (description) VALUES ('$description')";
    echo "Running query: htmlspecialchars($query)<br>";
    
    if ($conn->query($query) === TRUE){
        echo "New product added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalud request method.";
}
?>

