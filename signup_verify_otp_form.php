<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center">
    <div class="popup-contentLog bg-white rounded-xl shadow-lg w-1/3 my-5">
        <div class="p-10 space-y-4">
            <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900">
                Verify Your OTP
            </h1>
            <form method="POST" action="signup_data_send.php">
                <div class="otpVerifyDisplay2">
                    <label for="otpCode" class="block mb-2 text-sm font-medium text-gray-900">OTP Code</label>
                    <input type="text" name="otpCode" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter OTP" required><br>
                    <button id="otp-btnSignup" type="submit" name="SubmitOTP" class="w-full text-white bg-gray-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Verify</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>