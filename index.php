<html>
<head>
    <title>User Creation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.0.min.js"></script>
  </head>
<body>
<div class="container">
    <h1>Login</h1>
    <?php
    session_start();

// Check if there is an error message in the session
if (isset($_SESSION['error_message'])) {
    echo '<div class="text-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']); // Clear the error message
}
?>
    <form method="post" action="api/userLogin.php">
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password"required>
  </div>
  <div class="row">
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
<a href="register.php"> <button class="btn btn-primary" type="button">Crete User</button></a>
 </div>
</div>
</div>
</body>
</html>

