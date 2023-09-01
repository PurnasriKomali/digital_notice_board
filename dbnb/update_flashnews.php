<?php
session_start();
include "dbconn.php";

// Check if the user is not logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Redirect back to the login page
    header("Location: login.php");
    exit();
}

if (isset($_POST['update_flash'])) {
    $flash_id = $_POST['flash_id'];
    $updated_flash = $_POST['flash'];

    // Update the Flash News content in the database
    $sql = "UPDATE flashnews SET flash = '$updated_flash' WHERE id = '$flash_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['flash_update_success'] = "Flash News updated successfully.";
    } else {
        $_SESSION['flash_update_error'] = "Error updating Flash News: " . mysqli_error($conn);
    }

    header("Location: crud_flashnews.php"); // Redirect back to the CRUD Flash News page after updating
    exit();
}

if (isset($_POST['update']) && isset($_POST['flash_id'])) {
    $flash_id = $_POST['flash_id'];

    // Retrieve the existing Flash News content using the ID
    $sql = "SELECT * FROM flashnews WHERE id = '$flash_id'";
    $result = mysqli_query($conn, $sql);
    $flashData = mysqli_fetch_assoc($result);

    if ($flashData) {
        $flash_content = $flashData['flash'];
    } else {
        $_SESSION['flash_update_error'] = "Flash News not found.";
        header("Location: crud_flashnews.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
  <link rel="stylesheet" href="main.css"/>
</head>


<body>
  <div class="main">
  <div class="navbar-side">
    <h6>
        <span class="icon"><i class="fas fa-code"></i></span>
        <span class="link-text">Admin</span>
    </h6>
    <ul>
        <li>
            <a href="#" class="link-active" title="Dashboard">
                <span class="icon"><i class="fas fa-chart-bar"></i></span>
                <span class="link-text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="flashnews.php" title="Comment">
                <span class="icon"><i class="fas fa-comment"></i></span>
                <span class="link-text">Flash News</span>
            </a>
        </li>
        <li>
            <a href="birthdayform.php" title="Profile">
                <span class="icon"><i class="fas fa-user-circle"></i></span>
                <span class="link-text">Birthday</span>
            </a>
        </li>
        <li>
            <a href="achievements.php" title="Profile">
                <span class="icon"><i class="fas fa-user-circle"></i></span>
                <span class="link-text">Achievements</span>
            </a>
        </li>
        <li>
            <a href="quote.php" title="Profile">
                <span class="icon"><i class="fas fa-quote-left"></i></span>
                <span class="link-text">Quote</span>
            </a>
        </li>
        <li>
            <a href="crud_flashnews.php" title="Comment">
                <span class="icon"><i class="fas fa-database"></i></span>
                <span class="link-text">Crud Flash News</span>
            </a>
        </li>
        <li>
            <a href="crud_birthday.php" title="Profile">
                <span class="icon"><i class="fas fa-database"></i></span>
                <span class="link-text">Crud Birthday</span>
            </a>
        </li>
        <li>
            <a href="crud_achievements.php" title="Profile">
                <span class="icon"><i class="fas fa-database"></i></span>
                <span class="link-text">Crud Achievements</span>
            </a>
        </li>
        <li>
            <a href="crud_quote.php" title="Profile">
                <span class="icon"><i class="fas fa-quote-left"></i></span>
                <span class="link-text">Crud Quote</span>
            </a>
        </li>
        <li>
            <a href="logout.php" title="Sign Out">
                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="link-text">Log Out</span>
            </a>
        </li>
    </ul>
</div>

    <div class="content">
      <nav class="navbar navbar-dark bg-dark py-1">

        <a href="#" id="navBtn">
          <span id="changeIcon" class="fa fa-bars text-light"></span>
        </a>

        <div class="d-flex">
          
          <a class="nav-link text-light px-2" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>

      </nav>
      <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

 .container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

input[type="date"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea {
    height: 100px;
}

input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        display: block; /* Added to make the button full width */
        margin: 0 auto; /* Added to center the button */
    }

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
<div class="main">
        <div class="navbar-side">
            <!-- Your side navbar content here -->
        </div>

        <div class="content">
            <nav class="navbar navbar-dark bg-dark py-1">
                <!-- Your navbar content here -->
            </nav>

            <div class="container mt-4">
                <h2>Update Flash News</h2>
                <?php if (isset($_POST['update']) && isset($_POST['flash_id'])): ?>
                    <form method="post">
                        <input type="hidden" name="flash_id" value="<?php echo $flash_id; ?>">
                        <textarea name="flash" rows="4" class="form-control"><?php echo $flash_content; ?></textarea>
                        <input type="submit" name="update_flash" value="Update Flash News" class="btn btn-primary mt-2">
                    </form>
                <?php else: ?>
                    <p>Invalid request. Flash News ID not provided.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>


</html>
