<?php
session_start();

// Get the submitted username and password
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Check if the provided credentials match the expected values
if ($username === "admin" && $password === "admin") {
    // Authentication successful, set a session variable to indicate the user is logged in
    $_SESSION['user_logged_in'] = true;

    // Redirect to the dashboard page
    header("Location: Dashboard.php");
    exit();
} else {
    // Credentials are incorrect, show an error message or redirect back to login page
    echo "Invalid credentials. Please try again.";
    // Redirect back to login page after a short delay (you can replace "login.php" with the login page URL)
    header("refresh:3; url=login.php");
    exit();
}
?>
