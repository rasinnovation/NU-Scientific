<?php
    // Include the database connection file
    require_once('../include/database.php');

    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $accept_terms = $_POST['accept_terms'];
    $permission = "non-admin";

    // Check if the passwords match
    if ($password != $confirm_password) {
        $error_message = "Passwords do not match";
        header("Location: ../registration.php?error_message=" . urlencode($error_message));
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create a query to insert the new user into the database
    $sql = "INSERT INTO user (username, password, permissions, email) VALUES (?, ?, ?, ?)";
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $hashed_password, $permission, $email);
    $stmt->execute();

    $sql = "SELECT user_id from customer, user WHERE user_id = user.id";
    $stmt = $conn->prepare($sql);
    $userID = $stmt->execute();

    $sql = "INSERT INTO `customer` (name, email, phone, address, user_id) VALUES (NULL, NULL, NULL, NULL, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();

    // Redirect the user to the login page
    header("Location: ../login.php");
    exit();

