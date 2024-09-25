<?php
// Database connection
include 'database_connection.php';

// Initialize a variable to hold the success message
$message = '';

if (isset($_GET['email']) && isset($_POST['new_password'])) {
    $email = $_GET['email'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    // Update the user's password in the database
    $sql = "UPDATE users SET password = '$new_password', otp_code = NULL WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        $message = "Password reset successfully. <a href='signin_form.php' class='text-blue-600 underline'>Login now</a>";
    } else {
        $message = "Error updating password: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="text-center bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6">Reset Password</h1>
        <form action="" method="POST" class="space-y-4">
            <input type="password" name="new_password" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter new password" required>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 py-3 px-6 rounded-lg font-medium">Reset Password</button>
        </form>
        <!-- Display the message if it is set -->
        <?php if (!empty($message)): ?>
            <div class="mt-4 text-gray-700">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
