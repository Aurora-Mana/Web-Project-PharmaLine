<?php
  @include('users/config.php');
  session_start();
  $featured_query = "SELECT * FROM posts WHERE is_featured=1";
      $featured_result = mysqli_query($conn, $featured_query);
      $featured = mysqli_fetch_assoc($featured_result);

      $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
      $posts = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./assets/css/syleBlogUser.css">

</head>
<body>
    <header>

    <a href="index.php"><img src="image/Logo.png" alt="Logo" class="logo"></a>

        <div class="header-text">
          <img src="image/PharmaLineNameLogo.png" alt="" class="nameLogo">
        </div>
        <div class="header-icons">
        <img src="image/search.png" alt="Search" class="header-icon">
      <a href="users/login.php">
      <img src="image/user (1).png" alt="User" class="header-icon" onclick="showLoginForm()"></a>
      <img src="image/shopping-bag (1).png" alt="Shopping" class="header-icon">
      <a href="blogUser.php">
      <img src="image/blog1.png" alt="Shopping" class="header-icon"></a>
      
        </div>
      </header>

      <?php
      if(mysqli_num_rows($featured_result) == 1) :
      ?>
    <section class="featured">
        <div class="container featured__container">
            <div class="post__thumbnail">
                <img src="<?= $featured['thumbnail']?>">
            </div>
            <div class="post__info">

                <h2 class="post__title"><a href="blogPostUser.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                <p class="post__body">
                <?= substr($featured['body'],0 ,300) ?>...
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="./image/logoIcon.png">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?= $featured['author_id']?></h5>
                        <small><?= date("M d, Y - H:i", strtotime($featured['date_time']))?></small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif ?>

    <section class="posts">
        <div class="container posts__container">
          <?php while($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="<?= $post['thumbnail'] ?>">
                </div>
                <div class="post__info">
                    <h3 class="post__title">
                    <a href="blogPostUser.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p class="post__body">
                      <?= substr($post['body'],0 ,300) ?>...
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./image/logoIcon.png">
                        </div>
                        <div class="post__author-info">
                            <h5>By: <?= $post['author_id']?></h5>
                            <small><?= date("M d, Y - H:i", strtotime($post['date_time']))?></small>
                        </div>
                    </div>
                </div>
            </article>
          <?php endwhile ?>
        </div>
    </section>

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
    
      

    <script src="./assets/js/blogUser.js"></script>
</body>
</html>