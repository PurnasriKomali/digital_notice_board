<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'dnb');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    $achievement_id = $_POST['achievement_id'];
    $sql = "DELETE FROM `achievements` WHERE id='$achievement_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete_success'] = "Achievement deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fetch achievements
$sql = "SELECT * FROM `achievements`";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
<link rel="stylesheet" href="main.css"/>
</head>
<body>


            <?php if (isset($_SESSION['delete_success'])): ?>
    <script>
        alert("<?php echo $_SESSION['delete_success']; ?>");
        window.location.href = "crud_achievements.php"; // Redirect to crud_achievement page after OK
    </script>
    <?php unset($_SESSION['delete_success']); // Clear the session variable after displaying the message ?>
<?php endif ?>
        

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
