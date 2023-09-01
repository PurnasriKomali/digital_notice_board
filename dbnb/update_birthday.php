<?php
session_start();
include "dbconn.php";

if (isset($_POST['update']) && isset($_POST['birthday_id'])) {
    $birthday_id = $_POST['birthday_id'];

    // Retrieve the existing birthday data using the ID
    $sql = "SELECT * FROM birthday WHERE reg_no = '$birthday_id'";
    $result = mysqli_query($conn, $sql);
    $birthdayData = mysqli_fetch_assoc($result);

    if ($birthdayData) {
        $name = $birthdayData['name'];
        $dob = $birthdayData['dob'];
        $image = $birthdayData['image'];
    } else {
        $_SESSION['birthday_update_error'] = "Birthday data not found.";
        header("Location: crud_birthday.php");
        exit();
    }
} else if (isset($_POST['update_birthday']) && isset($_POST['birthday_id'])) {
    $birthday_id = $_POST['birthday_id'];
    $updated_name = $_POST['name'];
    $updated_dob = $_POST['dob'];
    // Handling image upload, if needed
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_temp = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $image = "uploads/" . uniqid() . ".$image_ext";
        move_uploaded_file($image_temp, $image);
    }

    // Update the birthday data using the ID
    $sql = "UPDATE birthday SET name = '$updated_name', dob = '$updated_dob'";
    if (isset($image)) {
        $sql .= ", image = '$image'";
    }
    $sql .= " WHERE reg_no = '$birthday_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['birthday_update_success'] = "Birthday data updated successfully.";
        header("Location: crud_birthday.php");
        exit();
    } else {
        $_SESSION['birthday_update_error'] = "Error updating birthday data: " . mysqli_error($conn);
    }
} else {
    $_SESSION['birthday_update_error'] = "Invalid request. Birthday ID not provided.";
    header("Location: crud_birthday.php");
    exit();
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
<div class="container mt-4">
    <h2>Update Birthday Information</h2>
    <?php
    // Fetch the current birthday data using the provided birthday_id
    if (isset($_POST['update']) && isset($_POST['birthday_id'])) {
        $birthday_id = $_POST['birthday_id'];
        $sql = "SELECT * FROM birthday WHERE reg_no = '$birthday_id'";
        $result = mysqli_query($conn, $sql);
        $birthdayData = mysqli_fetch_assoc($result);
        if ($birthdayData) {
            $name = $birthdayData['name'];
            $dob = $birthdayData['dob'];
    ?>
<form method="post" enctype="multipart/form-data" action="update_birthday.php">
        <!-- Note: I added the 'action' attribute to specify the URL to handle the form submission -->
        <input type="hidden" name="birthday_id" value="<?php echo $birthday_id; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <input type="submit" name="update_birthday" value="Update Birthday" class="btn btn-primary mt-2">
    </form>
    <?php
        } else {
            echo "<p>Birthday data not found.</p>";
        }
    } else {
        echo "<p>Invalid request. Birthday ID not provided.</p>";
    }
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    ?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>


</html>
