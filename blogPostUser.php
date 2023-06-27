<?php
  @include('users/config.php');
  session_start();

  $loggedIn = false; // Initialize the variable as false

if (isset($_SESSION['user_id'])) {
    // User is logged in
    $loggedIn = true;
}

  
  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT );
    $query ="SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
  }
  else{
    header('location: blogUser.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="assets/css/sytleBlogPostUser.css">
</head>
<body>
    <header>
    <a href="index.php"><img src="image/Logo.png" alt="Logo" class="logo"></a>        <div class="header-text">
            <img src="image/PharmaLineNameLogo.png" alt="Logo" class="nameLogo">
        </div>
        <div class="header-icons">
        <img src="image/search.png" alt="Search" class="header-icon">
        <a href="users/login.php">
        <img src="image/user (1).png" alt="User" class="header-icon" onclick="showLoginForm()"></a>
        <img src="image/shopping-bag (1).png" alt="Shopping" class="header-icon">
        <a href="blogUser.php">
        <img src="image/blog1.png" alt="Shopping" class="header-icon"></a>
        <?php if ($loggedIn) { ?>
                  <a href="users/logout.php">
                  <img src="image/logout.png" alt="Logout" class="header-icon"></a>  
                  </a>
      <?php }; ?> 
      
        </div>
      </header>
      
    <div class="body-content">
    <!-- Post -->
    <section class="singlepost">
        <div class="conatiner singlepostContainer"> 
            <h2> <?= $post['title'] ?> </h2>
            <div class = "postAuthor">
                <div class="postAuthorAvatar">
                    <img src="image/logoIcon.png" alt="">
                </div>
                <div class="postAuthorInfo">
                    <h5>By: PharmaLine</h5>
                    <small> <?= date("M d, Y - H:i", strtotime($post['date_time']))?></small>
                </div>
            </div>
            <div class="singlepostThumbail">
                <img src="<?= $post['thumbnail'] ?>" alt="product">
            </div>
            <p>
            <?= $post['body'] ?>
            </p>
            
        </div>
    </section>
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
              <option selected value="customer">Customer</option>
              <option value="admin">Admin</option>
     
            </select>
    
            <input type="submit" name="submit" value="Register" id="rbutton">
            <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
          </form>
        </div>
      
    </div>


</body>
</html>