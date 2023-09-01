<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'dnb');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $achievement_id = $_POST['achievement_id'];

    // Fetch the achievement data based on its ID
    $sql = "SELECT * FROM `achievements` WHERE id = '$achievement_id'";
    $result = mysqli_query($conn, $sql);
    $achievement = mysqli_fetch_assoc($result);

    // Display the form with the existing achievement data for updating
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
    height: 80vh;
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
        <div class="content">
            <div class="container">
                <h1>Update Achievement</h1>
                <form method="post">
                    <input type="hidden" name="achievement_id" value="<?php echo $achievement['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $achievement['name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" value="<?php echo $achievement['date']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Title/Description:</label>
                        <input type="text" id="title" name="title" value="<?php echo $achievement['title']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" id="category" name="category" value="<?php echo $achievement['category']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="details">Details:</label>
                        <textarea id="details" name="details" required><?php echo $achievement['details']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="update_achievement" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>


</html>
<?php
    exit(); // Stop the script from executing the rest of the code below this point
}

if (isset($_POST['update_achievement'])) {
    $achievement_id = $_POST['achievement_id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $details = $_POST['details'];

    // Update the achievement data in the database
    $sql = "UPDATE `achievements` SET name = '$name', date = '$date', title = '$title', category = '$category', details = '$details' WHERE id = '$achievement_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['upload_success'] = "Achievement updated successfully.";
    } else {
        echo "Error updating achievement: " . mysqli_error($conn);
    }

    header("Location: crud_achievements.php"); // Redirect back to the achievements page after updating
    exit();
}
?>