<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Redirect back to the login page
    header("Location: login.php");
    exit();
}

include "dbconn.php";

if (isset($_POST['delete']) && isset($_POST['quote_id'])) {
    $quote_id = $_POST['quote_id'];

    // Delete the quote from the database
    $sql = "DELETE FROM `quote` WHERE id = '$quote_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['quote_success'] = "Quote deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Redirect back to the "quote.php" page
header("Location: crud_quote.php");
exit();
?>
