<?php
// Database connection
include 'database_connection.php';

if (isset($_GET['email']) && isset($_POST['otpCode'])) {
    $email = $_GET['email'];
    $otpCode = $_POST['otpCode'];

    // Check if OTP is correct
    $sql = "SELECT * FROM users WHERE email = '$email' AND otp_code = '$otpCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // OTP is correct, allow password reset
        header("Location: enter_new_password.php?email=" . urlencode($email));
        exit;
    } else {
        echo "Invalid OTP.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="text-center bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6">Enter OTP</h1>
        <form action="" method="POST" class="space-y-4">
            <input type="text" name="otpCode" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter OTP" required>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 py-3 px-6 rounded-lg font-medium">Verify OTP</button>
        </form>
    </div>
</body>

</html>
