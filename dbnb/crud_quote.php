<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Redirect back to the login page
    header("Location: login.php");
    exit();
}
include "dbconn.php";
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
  </div>
  <div class="content">
      <nav class="navbar navbar-dark bg-dark py-1">

        <a href="dashboard.php" id="navBtn">
          <span id="changeIcon" class="fa fa-bars text-light"></span>
        </a>

        <div class="d-flex">
          
          <a class="nav-link text-light px-2" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>

      </nav>
        <!-- ... (Your existing PHP code) ... -->
<style>
    .container {
    font-family: Arial, sans-serif;
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    text-align: left;
}

tr:hover {
    background-color: #f2f2f2;
}

/* Adjust the side navbar width for full screen */
.navbar-side {
    width: 250px;
}

/* Adjust the content area for full screen */
.content {
    flex: 1;
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
<div class="container">
    <h1>Quote Data</h1>
    <table>
    <tr>
        <th>ID</th>
        <th>Quote</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    <?php
    // Fetch and display quotes
    $sql = "SELECT * FROM `quote`";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['quote']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
                <!-- Update and Delete buttons with quote ID -->
                <form method="post" action="update_quote.php">
                    <input type="hidden" name="quote_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="update" value="Update">
                </form>
                <form method="post" action="delete_quote.php">
                    <input type="hidden" name="quote_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="delete" value="Delete" style="background-color: red; color: white;">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<?php if (isset($_SESSION['quote_success'])): ?>
    <script>
        alert("<?php echo $_SESSION['quote_success']; ?>");
    </script>
    <?php unset($_SESSION['quote_success']); // Clear the session variable after displaying the message ?>
<?php endif ?>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
