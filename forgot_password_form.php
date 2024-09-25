<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="text-center bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6">Forgot Password</h1>
        <form action="send_password_reset_email.php" method="POST" class="space-y-4">
            <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your email" required>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 py-3 px-6 rounded-lg font-medium">Send Reset Link</button>
        </form>
    </div>
</body>

</html>
