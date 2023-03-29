<?php
    session_start();

    // Include the database connection file
    require_once('../include/database.php');

    // Check if the item details were passed in the URL
    if (isset($_GET['item'])) {
        // Decode the item details from the JSON string in the URL
        $item = json_decode(urldecode($_GET['item']), true);
        $quantity = 1;

        // Add the item to the cart in the database
        $sql = "INSERT INTO carts (user_id, equipment_id, quantity) VALUES (?, ?, ?)";
        $conn = connect_db(); // Implement your function to connect to the database
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $_SESSION['user_id'], $item, $quantity);
        $stmt->execute();
        echo 1;

        $conn->close();
        $stmt->close();

        header("Location: ../index.html");
        exit();
    }
