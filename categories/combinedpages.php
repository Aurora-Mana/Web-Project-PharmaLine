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
  <title>Pharmaline</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
    }

    body {
      background-color: #fff;
      margin: 0;
      padding: 0;
      overflow-y: scroll;
    }

    .container {
      margin: 0 auto;
      padding: 20px;
      color: rgba(0, 0, 0, 0.5);
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: calc(100% - 100px); /* Subtract header height from full viewport height */
    }


    .category {
      font-size: 24px;
      margin-bottom: 10px;
      text-align: center;
      margin-right: 269px;
      cursor:pointer;
    }

    header {
     background-color: #ffffff;
     box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
     display: flex;
     align-items: center;
     justify-content: space-between;
     padding: 5px; 
     height: 110px;
     }

    .logo {
     width: 80px;
     height: auto;
    }

   .logo-name{
    width: 200px;
    height: auto; 
    }

.header-icons {
  display: flex;
  align-items: center;
}

.header-icons .header-icon {
  width: 34px;
  height: 34px;
  margin-left: 12px;
  cursor: pointer;
  transition: transform 0.2s ease-in-out;
}

.header-icons .header-icon:hover {
  transform: scale(1.1);
}
    

    /* Each section with a different background image */
    .skin-care {
      background-image: url('../image/beauty-background-various-eco-friendly-cosmetic-skin-care-products-beauty-background-various-eco-friendly-cosmetic-184476996(1).png');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%; /* Set the height to 100% to cover the entire page */
      text-align: right;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-end;
      margin-top: -29px;
    }

    .body-care {
      background-image: url('../image/BLOG_bricini_body-cream_1200x1200.png');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%; /* Set the height to 100% to cover the entire page */
      text-align: right;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-end;
    }

    .hair-care {
      background-image: url('../image/spa-products-with-hair-brushes-blue-background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%; /* Set the height to 100% to cover the entire page */
      text-align: right;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-end;
    }

    .makeup {
      background-image: url('../image/foundation-bottles.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%; /* Set the height to 100% to cover the entire page */
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }


    a:link { 
      text-decoration: none; 
    }


   a:visited { 
    text-decoration: none; 
  }


   a:hover { 
    text-decoration: none; 
  }


  a:active { 
    text-decoration: none; 
  }

  p { 
    margin:5px;
   }

   #skinc{
     color: #586C5B; ;
   }
    
   #bodyc{
    color: #505050;
    margin-right: 1012px;
   }
   
   #hairc{
    color: #6A7273 ;
    margin-right: 1050px;
  }
   
   #makec{
    color: #6D5A4F ;
    margin-right: -808px;
   }
   
    
    body > div.container.body-care > div.header {
    font-size: 48px;
    margin-bottom: 36px;
    text-align: center;
    margin-right: 926px;
  }
 
   body > div.container.hair-care > div.header {
    margin-right: 1012px;
  }


   body > div.container.makeup > div.header {
    margin-right: -735px; 
   }

   body > footer > div.container > div > div:nth-child(1) {
    margin-right: 513px;
}
body > footer > div.container > div > div:nth-child(1) > p {
    margin-right: 548px;
}
body > footer > div.container > div > div:nth-child(2) > h4 {
    margin-top: -82px;
}
body > footer > div.footer-bottom > div > div > div > p {
    margin-right: -968px;
}

body > footer > div.container > div > div:nth-child(3) > div > h4 {
    margin-right: -839px;
    margin-top: -98px;
}
body > footer > div.container > div > div:nth-child(1) > h4 {
    margin-right: inherit;
}
body > div.container.makeup > div {
    margin-top: -216px;
}
  </style>
</head>
<body>
  <header>
    <a href="../index.php">
  <img src="../image/Logo.png" alt="Logo" class="logo"></a>
    <img src="../image/PharmaLineNameLogo.png" alt="" class="logo-name">
   
    <div class="header-icons">
      <img src="../image/search.png" alt="Search" class="header-icon">
      <a href="../users/login.php">
      <img src="../image/user (1).png" alt="User" class="header-icon" onclick="showLoginForm()"></a>
      <img src="../image/shopping-bag (1).png" alt="Shopping" class="header-icon">
      <a href="../blogUser.php">
      <img src="../image/blog1.png" alt="Shopping" class="header-icon"></a>   
      <?php if ($loggedIn) { ?>
                  <a href="../users/logout.php">
                  <img src="../image/logout.png" alt="Logout" class="header-icon"></a>  
                  </a>
      <?php }; ?>  
    </div>
  </header>

  <!-- Skin Care Page -->
  

  <div class="container skin-care">
    <div class="header">SKIN CARE</div>
    <a href="skincare/skincode.php"><p class="category" id="skinc">SkinCode</p></a>
    <a href="skincare/Geekandgorgeus.php"><p class="category" id="skinc">Geek&Gorgeous</p></a>
    <a href="skincare/larocheposay.php"></a><p class="category" id="skinc">La Roche Posay</p>
    <a href="skincare/YouthLab.php"> <p class="category" id="skinc">YouthLab</p></a>
  </div>

  <!-- Body Care Page -->
  <div class="container body-care">
    <div class="header">BODY CARE</div>
    <a href="bodycare/body.php">
    <p class="category" id="bodyc">Body Scrub</p>
    <p class="category" id="bodyc">Shower Gel</p>
    <p class="category" id="bodyc">Body Lotion & Mist</p></a>
  </div>

  <!-- Hair Care Page -->
  <div class="container hair-care">
    <div class="header">HAIR CARE</div>
    <p class="category" id="hairc">Shampoo</p>
    <p class="category" id="hairc">Conditioner</p>
    <p class="category" id="hairc">Hair Treatment</p>
  </div>

  <!-- Makeup Page -->
  <div class="container makeup">
    <div class="header">MAKEUP</div>
    <p class="category" id="makec">Foundation</p>
    <p class="category" id="makec">Mascara</p>
    <p class="category" id="makec">Lipstick</p>
    <p class="category" id="makec">Eyeshadow</p>
  </div>

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
