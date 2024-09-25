<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center bg-gray-100">
    <div class="popup-contentLog bg-white rounded-xl shadow-lg w-1/3 my-10">
        <div class="p-10 space-y-4">
            <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 text-center">
                Create a New Account
            </h1>
            <form class="space-y-4 md:space-y-6" method="POST" action="signup_data_send.php">

                <!-- First Name -->
                <div>
                    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                    <input type="text" name="fname" id="fname" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter your first name" required>
                </div>

                <!-- Last Name -->
                <div>
                    <label for="lname" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                    <input type="text" name="lname" id="lname" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter your last name" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="••••••••" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submitACC" class="w-full text-white bg-gray-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create Account</button>

                <!-- Redirect to Sign In -->
                <p class="text-sm font-light text-gray-500 text-center mt-5">
                    Already have an account?
                    <a href="signin_form.php" class="font-medium text-primary-600 hover:underline">Sign In</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>