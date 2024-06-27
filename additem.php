<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $description = $_POST['description'];

        $conn = new mysqli("localhost", "root", "password", "testdb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO products (description) VALUES (?)");
        $stmt->bind_param("s", $description);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "New item added successfully!";
    }
?>

<form method="post" action="">
    Description: <input type="text" name="description">
    <input type="submit" value="Add Item">
</form>
