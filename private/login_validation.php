<?php
    // Include the database connection file
    require_once('../include/database.php');

    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a query to retrieve the user with the given username
    $sql = "SELECT * FROM user WHERE username = ?";
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows == 0) {
        $error_message = "Username or password is incorrect";
        header("Location: ../login.php?error_message=" . urlencode($error_message));
        exit();
    }

    // Get the user's data from the database
    $row = $result->fetch_assoc();

    // Verify the password
    if (!password_verify($password, $row['password'])) {
        $error_message = "Username or password is incorrect";
        header("Location: ../login.php?error_message=" . urlencode($error_message));
        exit();
    }

    // Set session variables and redirect to the home page
    $conn->close();
    $stmt->close();

    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    header("Location: ../index.html");
    exit();
