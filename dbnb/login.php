<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Digital Notice Board</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./styles.css">
</head>
<body>
  <div id="login-form-wrap">
    <h2>Login</h2>
    <form id="login-form" action="process_login.php" method="post">
      <p>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="submit" id="login" value="Login">
      </p>
    </form>
    <div id="create-account-wrap">

    </div><!--create-account-wrap-->
  </div><!--login-form-wrap-->
</body>
</html>
