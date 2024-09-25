<?php
// Start session to track user login state
session_start();

// Database connection
include 'database_connection.php';

// Check if login form is submitted
if (isset($_POST['submitLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prevent SQL injection
    $email = $conn->real_escape_string($email);

    // Fetch user details from database
    $sql = "SELECT * FROM users WHERE email = '$email' AND is_verified = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, now check the password
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_fname'] = $user['fname'];

            // If the "Remember me" checkbox is checked, set a cookie
            if (isset($_POST['remember'])) {
                setcookie('user_email', $email, time() + (86400 * 30), "/"); // Cookie lasts 30 days
            }

            // Redirect to homepage after successful login
            header("Location: index.php");
            exit;
        } else {
            // Incorrect password
            echo "Invalid email or password.";
        }
    } else {
        // User does not exist or account is not verified
        echo "Account does not exist or is not verified.";
    }
}

$conn->close();
