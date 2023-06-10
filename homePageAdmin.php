<?php
@include('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script> <!--link for font awsome-->
    <link rel="stylesheet" type="text/css" href="assets/css/styleHomeAdmin.css">
</head>
<body>

  
  <div class="sidebar">
    <div class="icon-container">
      <div class="logo-sidebar">
        <img src="image/Logo.png" alt="Logo" class="logo">
        <img src="image/PharmaLineNameLogo.png" alt="Logo" class="nameLogo">
      </div>
      <div class="total-icons">
        <div class="icon" id="Check-sales">
          <i class="fas check-sales"></i>
          <img src="image/revenueIcon.png" alt="Sales Icon">
          <span class="icon-name">Check Sales</span>
        </div>
        <div class="icon" id="Generate-discount">
          <i class="fas generate-dis"></i>
          <img src="image/generateCodeIcon.png" alt="Discount Icon">
          <span class="icon-name">Generate Discount</span>
        </div>
        <div class="icon" id="Blog">
          <i class="fas blog"></i>
          <img src="image/logoIcon.png" alt="Blog Icon">
          <span class="icon-name">Blog</span>
        </div>
        <div class="icon" id="Log-out">
          <a href="users/logout.php">
          <i class="fas log-out"></i>
          <img src="image/user (1).png" alt="Bottom Icon">
          <span class="icon-name">Log out</span></a>
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