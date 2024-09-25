<?php
session_start();

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection
include 'database_connection.php';

// Account creation process
if (isset($_POST['submitACC'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if the user already exists
    $checkUser = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkUser);

    if ($result->num_rows == 0) {
        // Generate a 6-digit OTP
        $otpCode = rand(100000, 999999);

        // Insert user details into database
        $sql = "INSERT INTO users (fname, lname, email, password, otp_code) VALUES ('$fname', '$lname', '$email', '$password', '$otpCode')";

        if ($conn->query($sql) === TRUE) {
            // Send OTP via email using Resend API
            require __DIR__ . '/vendor/autoload.php';

            // Use the Resend API key from the .env file
            $resendApiKey = $_ENV['RESEND_API_KEY'];

            // Example of sending an email using the Resend API
            $resend = Resend::client($resendApiKey);

            $resend->emails->send([
                'from' => 'charith@zhake.live',
                'to' => [$email],
                'subject' => 'Account Verification - Your OTP Code',
                'html' => '<strong>Your OTP Code is: ' . $otpCode . '</strong>',
            ]);

            // Store email in session to track user during OTP verification
            $_SESSION['email'] = $email;

            // Redirect to OTP page for verification
            header('Location: signup_verify_otp_form.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Email already exists.";
    }
}

// OTP Verification process
if (isset($_POST['SubmitOTP'])) {
    $otpCode = $_POST['otpCode'];
    $email = $_SESSION['email'];

    // Check OTP
    $checkOTP = "SELECT * FROM users WHERE email = '$email' AND otp_code = '$otpCode' AND is_verified = 0";
    $result = $conn->query($checkOTP);

    if ($result->num_rows > 0) {
        // Update the user as verified
        $sql = "UPDATE users SET is_verified = 1 WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            // Redirect to home page after successful verification
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid OTP or the account is already verified.";
    }
}

$conn->close();
