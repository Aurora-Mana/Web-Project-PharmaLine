<!DOCTYPE html>
<html>
<head>
  <title>PharmaLine</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
  <header>
    <img src="image/Logo.png" alt="Logo" class="logo">
    <div class="header-text">
      <h1>PHARMALINE</h1>
    </div>
    <div class="header-icons">
      <img src="image/search.png" alt="Search" class="header-icon">
      <img src="image/user (1).png" alt="User" class="header-icon" onclick="showLoginForm()">
      <img src="image/shopping-bag (1).png" alt="Shopping" class="header-icon">
    </div>
  </header>
  
    <div class="body-content">
      <h1>Welcome to PharmaLine!</h1>
      <p>Your best health partner</p>
  
    <button onclick="window.location.href='categories/combinedpages.html'">View products</button>
  </div>

  <div id="loginFormOverlay" class="overlay">
    <div class="form-container">
      <h2>PharmaLine</h2>
      <form>
        <form action="index.html" method="post">
          <input type="email" placeholder="email" required>
          <input type="password" placeholder="Password" required>
          <input type="submit" name="submit" id="rbutton" value="Log in">
          <p>Don't have an account? <a href="#" onclick="showRegisterForm()">Register</a></p>
        </form>
      <div class="form-switch">
        <input type="checkbox" id="rememberMe">
        <label for="rememberMe">Remember me</label>
      </div>
    </div>
  </div>

  <div id="registerFormOverlay" class="overlay">
    <div class="form-container">
      <h2>Register</h2>
      <form action="index.html" method="post">
        <input type="text" name="fullname" placeholder="Full Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="repeat_password" placeholder="Repeat Password">
        
         <select name="user_type" class="form-select mb-3" name="role" aria-label="Default select example">
          <option selected value="custumer">Customer</option>
          <option value="clerk">Clerk</option>
          <option value="manager">Manager</option>
          <option value="admin">Admin</option>
 
        </select>

        <input type="submit" name="submit" value="Register" id="rbutton">
        <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
      </form>
    </div>
  </div>

  <script src="assets/js/script.js"></script>
</body>
</html>