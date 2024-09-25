<?php
session_start();

// If the user is not logged in, show Sign In and Sign Up buttons
if (!isset($_SESSION['user_email'])) {
    $isLoggedIn = false;
} else {
    $isLoggedIn = true;
    $user_fname = $_SESSION['user_fname']; // Fetch the first name from session
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="text-center bg-white p-8 rounded-lg shadow-lg">
        <?php if ($isLoggedIn): ?>
            <h1 class="text-3xl font-bold mb-4">Welcome, <?= htmlspecialchars($user_fname) ?>!</h1>
            <p class="text-lg">Your account has been successfully verified.</p>
            <a href="logout.php" class="inline-block mt-6 text-white bg-red-600 hover:bg-red-700 font-medium py-2 px-4 rounded-lg">Logout</a>
        <?php else: ?>
            <h1 class="text-3xl font-bold mb-6">Welcome to Our Website</h1>
            <div class="space-y-4">
                <a href="signin_form.php" class="inline-block w-full text-white bg-blue-600 hover:bg-blue-700 font-medium py-2 px-4 rounded-lg">Sign In</a>
                <a href="signup_form.php" class="inline-block w-full text-white bg-green-600 hover:bg-green-700 font-medium py-2 px-4 rounded-lg">Sign Up</a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
