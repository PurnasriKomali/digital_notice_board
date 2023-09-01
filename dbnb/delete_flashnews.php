<?php
session_start();
include "dbconn.php";

if (isset($_POST['delete']) && isset($_POST['flash_id'])) {
    $flash_id = $_POST['flash_id'];

    $sql = "DELETE FROM flashnews WHERE id = '$flash_id'";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['flash_delete_success'] = "Flash News deleted successfully.";
    } else {
        $_SESSION['flash_delete_error'] = "Error deleting Flash News: " . mysqli_error($conn);
    }

    header("Location: crud_flashnews.php");
    exit();
} else {
    $_SESSION['flash_delete_error'] = "Invalid request. Flash News ID not provided.";
    header("Location: crud_flashnews.php");
    exit();
}
