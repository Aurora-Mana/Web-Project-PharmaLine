<?php
include '../../users/config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Body Page</title>
  <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
  <style>

  .products {
      display: inline-block;
      width: 200px;
      margin: 10px;
      padding: 10px;
      background-color: #f5f5f5;
      text-align: center;
      cursor: pointer; /* Add cursor style for hover effect */
    }

    .products img {
      width: 150px;
      height: 150px;
      margin-bottom: 10px;
    }

    .buy-btn{
      background-color: #4caf50;
      color: #fff;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
    }

    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  height: 100vh;
}

header {
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
}

.logo {
  width: 80px;
  height: auto;
}

.logo-name{
  width: 200px;
  height: auto;
}

.header-text {
  text-align: center;
  flex-grow: 1;
}

.header-text h1 {
  font-size: 24px;
  color: #333333;
  margin: 0;
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

body > footer {
  margin-top: 26px;
}
body > div > div > div:nth-child(1) > div > center > h3 {
  margin-top: 25px;
}

  </style>
</head>
<body>
 <header>
    <img src="../../image/Logo.png" alt="Logo" class="logo">
    <img src="../../image/PharmaLineNameLogo.png" alt="" class="logo-name">
   
    <div class="header-icons">
      <img src="../../image/search.png" alt="Search" class="header-icon">
      <a href="../../users/login.php">
      <img src="../../image/user (1).png" alt="User" class="header-icon" onclick="showLoginForm()"></a>
      <img src="../../image/shopping-bag (1).png" alt="Shopping" class="header-icon">
      <a href="../../blogUser.php">
      <img src="../../image/blog1.png" alt="Shopping" class="header-icon"></a>   
    </div>
  
 </header>

<div class="products">
    <div class="row mx-auto container-fluid">
      <?php
      $select_query = "Select * from 'products'";
      $result_query = mysqli_query($conn, $select_query);
      $row = mysqli_fetch_array($result_query);

      echo $row['name'];
    
      ?>

      <?php while($row=mysqli_fetch_assoc($result_query)){ ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img alt="" class="img-fluid- mb-3" src="../../image/<?php echo $row['image']; ?>"/>
        <div class="star">
        <i class="fa-solid fa-star" style="color: #f2d51c;"></i>
        <i class="fa-solid fa-star" style="color: #f2d51c;"></i>
        <i class="fa-solid fa-star" style="color: #f2d51c;"></i>
        <i class="fa-solid fa-star" style="color: #f2d51c;"></i>
        <i class="fa-solid fa-star" style="color: #f2d51c;"></i>
        </div>
        <h5 class="p-name"><? echo $row['name']; ?></h5>
        <h4 class="p-price"><? echo $row['price']; ?></h4>
        <button class="buy-btn">Add to Cart</button>
      </div>
    </div>

    <?php  }; ?>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4>About PharmaLine</h4>
        <p>PharmaLine is your best health partner, providing a wide range of health and beauty products to enhance your well-being.</p>
      </div>
      <div class="col-md-4">
        <h4>Quick Links</h4>
        <ul>
          <li>Home</a></li>
          <li>Shop</a></li>
          <li>Blog</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h4>Contact Information</h4>
        <p>123 Main Street, Tirane, Albania</p>
        <p>Email: info@pharmaline.com</p>
        <p>Phone: +1 123 456 7890</p>
      </div>
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
