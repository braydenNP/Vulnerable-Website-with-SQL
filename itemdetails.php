<?php
    $conn = new mysqli("localhost", "root", "password", "testdb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['itemID'])) {
        $itemID = $_GET['itemID'];
        $result = $conn->query("SELECT description FROM products WHERE id=$itemID");

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row['description'];
            }
        } else {
            echo "No results found";
        }
    } else {
        echo "No itemID provided";
    }

    $conn->close();
?>
