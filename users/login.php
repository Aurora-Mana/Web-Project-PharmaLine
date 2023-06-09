<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Login</title>
</head>
<body>
<div id="loginFormOverlay" class="overlay">
    <div class="form-container">
      <h2>PharmaLine</h2>
      <form>
        <form action="index.php" method="post">
          <input type="email" placeholder="Email" required>
          <input type="password" placeholder="Password" required>
          <input type="submit" name="submit" id="rbutton" value="Log in">
          <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
      <div class="form-switch">
        <input type="checkbox" id="rememberMe">
        <label for="rememberMe">Remember me</label>
      </div>
    </div>
  </div>
</body>
</html>