<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        // Redirect the user to the login page if they are not logged in
        header('Location: login.php');
        exit();
    }
    // Retrieve the order information from the form data
//    $shipping_name = $_POST['shipping-name'];
//    $shipping_address = $_POST['shipping-address'];
//    $shipping_city = $_POST['shipping-city'];
//    $shipping_state = $_POST['shipping-state'];
//    $shipping_zip = $_POST['shipping-zip'];
//    $card_number = $_POST['card-number'];
//    $card_expiry = $_POST['card-expiry'];
//    $card_cvv = $_POST['card-cvv'];

    $order_date = date('Y-m-d');
    $total = $_POST['total'];

    // Connect to the database
    require_once '../include/database.php';
    $conn = connect_db();

    // Retrieve the items in the user's shopping cart from the database
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM carts WHERE user_id = $user_id";
    $result = $conn->query($sql);

    // Insert the order information into the orders table
    $sql = "INSERT INTO orders (customer_id, order_date, total_amount)
            VALUES ($user_id, '$order_date', '$total')";
    $conn->query($sql);

// Retrieve the order ID from the database
$order_id = $conn->insert_id;

// Clear the user's shopping cart
$sql = "DELETE FROM carts WHERE user_id = $user_id";
$conn->query($sql);

// Redirect the user to the order confirmation page
header('Location: ../order-confirmation.php');
exit();

