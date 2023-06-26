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
    </div>
  
  </header>


  <section class="cart container my-5 py-5">
    <div class="container mt-5">
         <h2 class="font-weight-bold">Your Cart</h2>
         <hr>
    </div>
    
    <table class="mt-5 pt-5">
       <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>SubTotal</th>
       </tr>

       <tr>
        <td>
            <div class="product-info">
                <img src="image/1_Hydraphase-HA-Light.png" alt="">
                <div>
                    <p>Hydraphase</p>
                    <small><span>$</span>115</small>
                    <br>
                    <a class="remove-btn" href="#">Remove</a>
                </div>
            </div>
        </td>
       </tr>
    </table>
  </section>
   
  <script src="assets/js/script.js"></script>
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