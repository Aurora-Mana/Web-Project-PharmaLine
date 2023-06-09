<?php
@include('config.php');
session_start();

$loggedIn = false; // Initialize the variable as false

if (isset($_SESSION['user_id'])) {
    // User is logged in
    $loggedIn = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>PharmaLine</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <img src="image/Logo.png" alt="Logo" class="logo">
    <img src="image/PharmaLineNameLogo.png" alt="" class="logo-name">
   
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
<div class="categories">
  <div class="img-slider">

    <div class="slide active">
      <img src="image/179521397963e7c23f873bdd95c7435d.w3841.h1280.png" alt="">
      <div class="info">
        <br><br>
        <center>
       <h3>Welcome to PharmaLine!</h3>
       <p>Your best health partner</p>
       <br>
       <button onclick="window.location.href='categories/combinedpages.php'">View products</button>
      </div>
</center>
      </div>

      <div class="slide">
      <img src="image/beauty-background-various-eco-friendly-cosmetic-skin-care-products-beauty-background-various-eco-friendly-cosmetic-184476996.png" alt="">
         <div class="info">
          <div class="skincare">
          <h3>SKIN CARE</h3>
         <a href="categories/skincare/skincode.php"><p class="category" id="skinc">SkinCode</p></a>
         <a href="categories/skincare/Geekandgorgeus.php"><p class="category" id="skinc">Geek&Gorgeous</p></a>
         <a href="categories/skincare/larocheposay.php"></a><p class="category" id="skinc">La Roche Posay</p>
         <a href="categories/skincare/YouthLab.php"> <p class="category" id="skinc">YouthLab</p></a>
          </div>
        </div>
      </div>

      <div class="slide">
      <img src="image/BLOG_bricini_body-cream_1200x1200.png" alt="">
         <div class="info">
          <div class="bodycare">
          <h3>BODY CARE</h3>
         <p class="category" id="bodyc">Body Scrub</p>
         <p class="category" id="bodyc">Shower Gel</p>
         <p class="category" id="bodyc">Body Lotion & Mist</p>
         </div>
        </div>
      </div>


      <div class="slide">
      <img src="image/spa-products-with-hair-brushes-blue-background.jpg" alt="">
         <div class="info">
          <div class="haircare">
          <h3>HAIR CARE</h3>
         <p class="category" id="hairc">Shampoo</p>
         <p class="category" id="hairc">Conditioner</p>
         <p class="category" id="hairc">Hair Treatment</p>
         </div>
        </div>
      </div>


      <div class="slide">
       <img src="image/foundation-bottles.jpg" alt="">
        <div class="info">
         <div class="makeup">
          <h3>MAKEUP</h3>
          <p class="category" id="makec">Foundation</p>
          <p class="category" id="makec">Mascara</p>
          <p class="category" id="makec">Lipstick</p>
          <p class="category" id="makec">Eyeshadow</p>
        </div>
       </div>
      </div>

      <div class="nav-btn">
        <div class="btnl active"></div>
        <div class="btnl"></div>
        <div class="btnl"></div>
        <div class="btnl"></div>
        <div class="btnl"></div>

      </div>

     </div>
    </div>
  <script src="assets/js/script.js"></script>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>About PharmaLine</h4>
          <p>PharmaLine is your best health partner, providing a wide </br>range of health and beauty products to enhance your well-being.</p>
        </div>
  
        <div class="col-md-4">
          <h4>Contact Information</h4>
          <p>123 Main Street, Tirane, Albania</p>
          <p>Email: info@pharmaline.com</p>
          <p>Phone: +1 123 456 7890</p>
        </div>
        <div class="col-md-4">
          <div class="footer-section social">
            <h4>Follow Us</h4>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>&copy; 2023 PharmaLine. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>