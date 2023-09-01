<?php
session_start();
include "dbconn.php";

if (isset($_POST['delete']) && isset($_POST['birthday_id'])) {
    $birthday_id = $_POST['birthday_id'];

    // Check if the record with the provided ID exists in the database
    $sql = "SELECT * FROM birthday WHERE reg_no = '$birthday_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Delete the birthday record from the database
        $delete_sql = "DELETE FROM birthday WHERE reg_no = '$birthday_id'";
        if (mysqli_query($conn, $delete_sql)) {
            $_SESSION['birthday_success'] = "Birthday record deleted successfully.";
        } else {
            $_SESSION['birthday_error'] = "Error deleting birthday record: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['birthday_error'] = "Birthday record not found.";
    }
}

header("Location: crud_birthday.php"); // Redirect back to the CRUD Birthday page after deletion
exit();
?>
