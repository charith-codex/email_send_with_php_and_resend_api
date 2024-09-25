<?php
session_start(); // Start session

// Destroy all session data
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Redirect to the login page after logging out
header("Location: signin_form.php");
exit();
