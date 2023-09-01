<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Redirect back to the login page
    header("Location: login.php");
    exit();
}
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
      <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6 p-2">
            <div class="card border-primary rounded-0">
                <div class="card-header bg-primary rounded-0">
                    <h5 class="card-title text-white mb-1">Birthday Wishes</h5>
                </div>
                <div class="card-body">
                    <a href="birthdayform.php">
                        <h1 class="display-4 font-weight-bold text-primary text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 p-2">
            <div class="card border-success rounded-0">
                <div class="card-header bg-success rounded-0">
                    <h5 class="card-title text-white mb-1">Flash News</h5>
                </div>
                <div class="card-body">
                    <a href="flashnews.php">
                        <h1 class="display-4 font-weight-bold text-success text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 p-2">
            <div class="card border-danger rounded-0">
                <div class="card-header bg-danger rounded-0">
                    <h5 class="card-title text-white mb-1">Achievements</h5>
                </div>
                <div class="card-body">
                    <a href="achievements.php">
                        <h1 class="display-4 font-weight-bold text-danger text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 p-2">
            <div class="card border-primary rounded-0">
                <div class="card-header bg-primary rounded-0">
                    <h5 class="card-title text-white mb-1">Crud Birthday</h5>
                </div>
                <div class="card-body">
                    <a href="crud_birthday.php">
                        <h1 class="display-4 font-weight-bold text-primary text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 p-2">
            <div class="card border-success rounded-0">
                <div class="card-header bg-success rounded-0">
                    <h5 class="card-title text-white mb-1">Crud Flash News</h5>
                </div>
                <div class="card-body">
                    <a href="crud_flashnews.php">
                        <h1 class="display-4 font-weight-bold text-success text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 p-2">
            <div class="card border-danger rounded-0">
                <div class="card-header bg-danger rounded-0">
                    <h5 class="card-title text-white mb-1">Crud Achievements</h5>
                </div>
                <div class="card-body">
                    <a href="crud_achievements.php">
                        <h1 class="display-4 font-weight-bold text-danger text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 p-2">
            <div class="card border-primary rounded-0">
                <div class="card-header bg-primary rounded-0">
                    <h5 class="card-title text-white mb-1">Quote</h5>
                </div>
                <div class="card-body">
                    <a href="quote.php">
                        <h1 class="display-4 font-weight-bold text-primary text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 p-2">
            <div class="card border-success rounded-0">
                <div class="card-header bg-success rounded-0">
                    <h5 class="card-title text-white mb-1">Crud Quote</h5>
                </div>
                <div class="card-body">
                    <a href="crud_quote.php">
                        <h1 class="display-4 font-weight-bold text-success text-center">Add</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

      
        

        <div class="row">
          <div class="col-lg-6 p-2">
            <div class="jumbotron rounded-0">
              <h1 class="display-4">Skill based Learning</h1>
              <p class="lead">approach in which skills are acquired through practice and application
              </p>
              <hr class="my-4">
              <p>Essential in developing students' abilities to read, write, and express themselves verbally, this approach is important to develop successful learners</p>
              
            </div>
          </div>
          <div class="col-lg-6 p-2">
            <div class="jumbotron rounded-0">
              <h1 class="display-4">CSD where u can explore infinity</h1>
              <p class="lead">This branch of computer science focuses on the mathematical and theoretical aspects of computation
              </p>
              <hr class="my-4">
              <p>This area deals with creating and exploring computer-generated images and visual representations.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
