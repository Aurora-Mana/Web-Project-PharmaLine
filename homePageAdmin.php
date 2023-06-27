<?php
@include('config.php');
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('location: users/login.php');
    exit; // Stop executing the rest of the code
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styleHomeAdmin.css">
    <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
    
    
    
</head>
<body>

<div class="sidebar">
    <div class="icon-container">
      <div class="logo-sidebar">
        <img src="image/Logo.png" alt="Logo" class="logo">
        <img src="image/PharmaLineNameLogo.png" alt="Logo" class="nameLogo">
      </div>
      <div class="total-icons">
      
      <div class="icon" id="Home">
      <a href="homePageAdmin.php">
      <i class="fa-solid fa-house" style="color: #21324f;"></i>
      <span class="icon-name">Home</span>
      </a>
      </div>
     
   
        <div class="icon" id="Generate-discount">
         <a href="generateDiscount.php">
        <i class="fa-solid fa-tags" style="color: #0c182c;"></i>
          <span class="icon-name">Generate Discount</span>
         </a>
        </div>

      <a href="blogAdmin.php">
        <div class="icon" id="Blog">
          <i class="fas blog"></i>
          <img src="image/logoIcon.png" alt="Blog Icon">
          <span class="icon-name">Blog</span>
        </div>
      </a>
        <div class="icon" id="Manage Products">
        <a href="manageProducts.php">
        <i class="fa-solid fa-list-check" style="color: #25395b;"></i>
          <span class="icon-name">Manage Products</span>
         </a>
        </div>
        
        <div class="icon" id="Log-out">
          <a href="users/logout.php">
          <i class="fa-solid fa-right-from-bracket" style="color: #222d3f;"></i>
          <span class="icon-name">Log Out</span>
         </a>
        </div>
        </div>
    </div>
  </div>


  <div class="body-content">
    <h1>Welcome Admin!</h1>
  </div>

</body>
<script src="assets\js\homePageAdmin.js"></script>
</html>