<?php
include '../../users/config.php';

session_start();

$loggedIn = isset($_SESSION['user_id']); // Set $loggedIn based on whether user_id is set in session

$user_id = $_SESSION['user_id'] ?? null; // Assign the value of user_id if set, or null if not set



if(isset($_POST['add_to_cart'])){
  $product_name = $_POST['product_name'];
  $product_price = $_POST['price'];
  $product_image = $_POST['product_image'];
  $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE product_name = '$product_name' AND user_id = '$user_id'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert = "INSERT INTO cart (user_id, product_name, price, image, quantity) VALUES('$user_id','$product_name', '$product_price', '$product_image', '$product_quantity')";
      $insert_product = mysqli_query($conn,$insert);
      $message[] = 'product added to cart succesfully';
   }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>MAKE UP Page</title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/styleProductPage.css">
  <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    body {
  background-image: url('../../image/foundation-bottles.jpg');
  background-size: 100%;
  background-repeat: no-repeat;
  margin: 0;
  padding: 0;
  background-color: transparent;
}


.container {
  margin: 0 auto;
  padding: 20px;
  color:   rgba(0, 0, 0, 0.5);
  text-align: center; /* Center the text */
  margin-top: -17px;

}



.header {
  font-size: 48px; /* Increase the font size for "SKIN CARE" */
  margin-bottom: 20px;
  text-align: center;
}

.category {
  font-size: 24px; /* Increase the font size for category names */
  margin-bottom: 10px;
  text-align: center;
}

    .category-link {
      text-decoration: underline;
      color: white;
    }

    /* Additional styles for header section */
    header {
      background-color: #fff;
      padding: 20px;
      display: flex;
      align-items: center;
    }

    .logo {
      width: 50px;
      height: 50px;
    }

    .header-text {
      margin-left: 20px;
    }

    .header-icons {
      margin-left: auto;
    }

    .header-icon {
      width: 30px;
      height: 30px;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <header>
    <img src="../../Logo.png" alt="Logo" class="logo">
    <div class="header-text">
      <h1>PHARMALINE</h1>
    </div>
    <div class="header-icons">
      <img src="../../image/search.png" alt="Search" class="header-icon">
      <img src="../../image/user (1).png" alt="User" class="header-icon" onclick="showLoginForm()">
      <?php if ($loggedIn) { ?>
                  <a href="../../users/logout.php">
                  <img src="../../image/logout.png" alt="Logout" class="header-icon"></a>  
                  </a>
      <?php }; ?> 
      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
      <a href="../../cart.php">
      <img src="../../image/shopping-bag (1).png" alt="Shopping" class="header-icon"> <span><?php echo $row_count; ?></span>
    </a>
    </div>
    </div>
  </header>

  <div class="products"> 
  <?php
         $select = "SELECT * FROM  products ORDER BY rand()";
         $result_query = mysqli_query($conn, $select);
         while( $row = mysqli_fetch_assoc($result_query)){
         if($row['category']=='makeup'){
     ?>
    <form action="" method="post">

       <div class='card' style='width: 18rem;'>
         <img alt='' class='icard-img-top' src='../../image/<?php echo $row['image']?>'>
          <div class='card-body'>
            <div class='star'>
               <i class='fa-solid fa-star' style='color: #f2d51c;' id='star1'></i>
               <i class='fa-solid fa-star' style='color: #f2d51c;'></i>
               <i class='fa-solid fa-star' style='color: #f2d51c;'></i>
               <i class='fa-solid fa-star' style='color: #f2d51c;'></i>
               <i class='fa-solid fa-star' style='color: #f2d51c;'></i>
               <i class='fa-solid fa-star' style='color: #f2d51c;'></i>
             </div>
           <h5 class='card-title'><?php echo $row['product_name']?></h5>
           <h4 class='card-text'><?php echo $row['price']?> $</h4>
           <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
           <button type="submit" class='btn btn-primary' name="add_to_cart" value="add to cart">Add to Cart</button></a>
           <button type="submit" class='btn btn-primary' name="view" value="view">View More</button></a>
         </div>
        </div>
      </form>
      <?php  
        };
      };
     ?> 
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

  <script src="script.js"></script>
</body>
</html>
