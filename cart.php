<?php
@include 'users/config.php';


session_start();

$loggedIn = false; // Initialize the variable as false

if (isset($_SESSION['user_id'])) {
    // User is logged in
    $loggedIn = true;
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['update_update_btn'])){
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id'];
  
  $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
  if($update_quantity_query){
     header('location:cart.php');
  };
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
  header('location:cart.php');
};

if(isset($_GET['delete_all'])){
  mysqli_query($conn, "DELETE FROM `cart`");
  header('location:cart.php');
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/styleCart.css">
  <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
  <a href="index.php">
    <img src="image/Logo.png" alt="Logo" class="logo"></a>
    <img src="image/PharmaLineNameLogo.png" alt="" class="logo-name">
   
    <div class="header-icons">
      <img src="image/search.png" alt="Search" class="header-icon">
      <a href="users/login.php">
      <img src="image/user (1).png" alt="User" class="header-icon"></a>
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

  <section class="cart container my-5 py-5">
    <div class="container mt-5">
         <h2 class="font-weight-bold">Your Cart</h2>
         <hr>
    </div>
    
    <table class="mt-5 pt-5">
       <tr>
        <th>Product Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>SubTotal</th>
        <th>Action</th>
       </tr>
       
       <?php   
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>
           <tr>
              <td>
                <img src="image/<?php echo $fetch_cart['image']; ?>" alt="">
              </td>
              <td>
              <?php echo $fetch_cart['product_name']; ?>
              </td>

              <td>
               <span>$</span>
               <span class="p-price"><?php echo number_format($fetch_cart['price']); ?></span>
              </td>
              <td>
              <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form> 
              </td> 
              <td><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
              <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         
          <tr class="table-bottom">
            <td><a href="categories/combinedpages.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
            <td colspan="3">Grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>
    </table>
    
   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>
  </section>
   
  <script src="assets/js/cart.js"></script>
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