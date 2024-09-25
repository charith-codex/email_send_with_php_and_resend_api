<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection
include 'database_connection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a random OTP code
        $otpCode = rand(100000, 999999);

        // Save OTP code in the database for that user
        $sql = "UPDATE users SET otp_code = '$otpCode' WHERE email = '$email'";
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
                'subject' => 'Password Reset - Your OTP Code',
                'html' => '<strong>Your OTP Code is: ' . $otpCode . '</strong>',
            ]);

            // Redirect to OTP verification page
            header("Location: enter_password_reset_otp.php?email=" . urlencode($email));
            exit;
        } else {
            echo "Error updating OTP: " . $conn->error;
        }
    } else {
        echo "Email not found.";
    }
}

$conn->close();
