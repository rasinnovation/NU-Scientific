<?php
    // Include the database connection file
    require_once('../include/database.php');

    // Check if the form has been submitted
//    if (isset($_POST['submit'])) {
      // Get the form data
      $username = $_POST['username'];
      $email = $_POST['email'];

      // Create a query to retrieve the user with the given username and email
      $sql = "SELECT * FROM user WHERE username = ? AND email = ?";
      $conn = connect_db();
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $username, $email);
      $stmt->execute();
      $result = $stmt->get_result();

      // Check if the user exists
      echo $result->num_rows;
      if ($result->num_rows == 0) {
        $error_message = "Username or email is incorrect";
        header("Location: ../forgot_password.php?error_message=" . urlencode($error_message));
        exit();
      } else {
        $success_message = "Email has been successfully sent";
        header("Location: ../forgot_password.php?success_message=" . urlencode($success_message));
        exit();
      }
        // EMAIL FUNCTIONALITY
        // COMMENT OUT AS REFERENCE TO ACTUAL CODE

//        // Get the user's data from the database
//        $row = $result->fetch_assoc();


//        // Generate a random password reset token
//        $reset_token = bin2hex(random_bytes(16));
//
//        // Update the user's record in the database with the reset token
//        $sql = "UPDATE user SET reset_token = ? WHERE id = ?";
//        $stmt = $conn->prepare($sql);
//        $stmt->bind_param("si", $reset_token, $row['id']);
//        $stmt->execute();
//
//        // Send the password reset email
//        $to = $row['email'];
//        $subject = "Password Reset";
//        $message = "Hello " . $row['username'] . ",\n\n";
//        $message .= "To reset your password, please click the following link:\n\n";
//        $message .= "https://example.com/reset_password.php?token=" . urlencode($reset_token) . "\n\n";
//        $message .= "If you did not request a password reset, please ignore this email.\n\n";
//        $headers = "From: support@example.com\r\n";
//        $headers .= "Reply-To: support@example.com\r\n";
//        $headers .= "Content-type: text/plain\r\n";
//
//        if (mail($to, $subject, $message, $headers)) {
//          $success_message = "An email has been sent with instructions on how to reset your password";
//        } else {
//          $error_message = "Failed to send password reset email";
//        }

        //*********************************//
        // QUICK FIX TO SIMULATE EMAIL SENT//

//      }
//      }