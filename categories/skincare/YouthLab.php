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
  <title>Pharmaline - YouthLab Products</title>
  <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    .product-box {
      display: inline-block;
      width: 200px;
      margin: 10px;
      padding: 10px;
      background-color: #f5f5f5;
      text-align: center;
      cursor: pointer; /* Add cursor style for hover effect */
    }

    .product-box img {
      width: 150px;
      height: 150px;
      margin-bottom: 10px;
    }

    .add-to-bag-button {
      background-color: #4caf50;
      color: #fff;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #f5f5f5;
    }

    .logo {
      width: 70px;
      height: 70px;
    }

    .header-text {
      margin-left: 200px;
    }

    .shopping-bag-icon {
      display: flex;
      align-items: center;
      cursor: pointer;
      position: relative;
    }

    .header-icon {
      width: 24px;
      height: 24px;
    }

    .cart-items-count {
      position: absolute;
      top: -10px;
      right: -10px;
      width: 20px;
      height: 20px;
      background-color: #4caf50;
      color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
    }

    .cart-menu {
      position: absolute;
      top: 30px;
      right: 0;
      width: 200px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 10px;
      display: none;
    }

    .cart-menu-items {
      max-height: 200px;
      overflow-y: auto;
    }



    .header-icon {
    width: 40px;
    height: 40px;
    margin-left: 1035px;
}

     .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 16px;
        padding: 10px;
        background-color: #f5f5f5;
      }

      .logo {
        display: flex;
        align-items: center;
        margin-left:180px;
        font-size: 20px;
      }

      .logo img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

      .logo span {
        font-weight: bold;
      }

      .cart-icon {
        display: flex;
        align-items: center;
        position: relative;
      }

      .cart-icon img {
    width: 40px;
    height: 40px;
    margin-right: 5px;
    cursor: pointer;
}

      .cart-icon .dot {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 15px;
        height: 15px;
        background-color: green;
        border-radius: 50%;
      }

      body > header > img {
    width: 120px;
    height: 70px;
    position: absolute;
}



  </style>
  </head>

  <!--This is the body part-->  

<body>
  <header class="header">
    <div class="logo"> YouthLabProducts</div>
    <a href="../combinedpages.php">
    <img src="../../image/youthlogo.png" alt="Logo"></a>
    <?php if ($loggedIn) { ?>
                  <a href="../../users/logout.php">
                  <img src="../../image/logout.png" alt="Logout" class="header-icon"></a>  
                  </a>
      <?php }; ?> 
    <div class="cart-icon" onclick="toggleCartMenu()">
    <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
      <a href="../../cart.php">
      <img src="../../image/shopping-bag (1).png" alt="Shopping" class="header-icon"> <span><?php echo $row_count; ?></span>
    </a>
    </div>
      <div id="cart-count" class="cart-count"></div>
      <div id="cart-menu" class="cart-menu"></div>
    </div>
  </header>

  <!-- SkinCode Page -->
  <div class="container skin-code-page">
  <div class="products"> 
  <?php
         $select = "SELECT * FROM  products ORDER BY rand()";
         $result_query = mysqli_query($conn, $select);
         while( $row = mysqli_fetch_assoc($result_query)){
         if($row['category']=='skincare' && $row['brand']=='youthlab'){
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

    <div class="product-box" onclick="showProductDetails('5200142100476_1.png', 'Retinol Reboot Hydra-Gel Eye Patches – 60 pcs.')">
      <img src="../../image/5200142100476_1.png" alt="Product.A">
      <h3>Retinol Reboot Hydra-Gel Eye Patches – 60 pcs.</h3>
      <p>16.50$</p>
      <button class="add-to-bag-button" onclick="addToCart('Retinol Reboot Hydra-Gel Eye Patches – 60 pcs.', '5200142100476_1.png')">Add to Bag</button>
   </div>
       
   <div class="product-box" onclick="showProductDetails('5200142100506_1.png', 'Retinol Reboot Mask – 1 pc ')">
    <img src="../../image/5200142100506_1.png" alt="Product B">
    <h3>Retinol Reboot Mask – 1 pc</h3>
    <p>8.50$</p>
    <button class="add-to-bag-button" onclick="addToCart('Retinol Reboot Mask – 1 pc' , '5200142100506_1.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('hydro-cloud-serum_a.png', 'hydro-cloud-serum_a.png')">
    <img src="../../image/hydro-cloud-serum_a.png" alt="Product C">
    <h3> Ηydro Cloud Serum 30ml</h3>
    <p>39$</p>
    <button class="add-to-bag-button" onclick="addToCart('Ηydro Cloud Serum 30ml', 'hydro-cloud-serum_a.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('5200142100391_1.png', 'Hydro Cloud Oil-Free Water Gel')">
    <img src="../../image/5200142100391_1.png" alt="Product C">
    <h3>Hydro Cloud Oil-Free Water Gel</h3>
    <p>18.80$</p>
    <button class="add-to-bag-button" onclick="addToCart('Hydro Cloud Oil-Free Water Gel', '5200142100391_1.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('CC-Complete-Cream-Oily.png', 'CC Complete Cream SPF 30')">
    <img src="../../image/CC-Complete-Cream-Oily.png" alt="Product C">
    <h3>CC Complete Cream SPF 30</h3>
    <p>110.47$</p>
    <button class="add-to-bag-button" onclick="addToCart('CC Complete Cream SPF 30' , 'CC-Complete-Cream-Oily.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('eye-Patches-peptides_Site-award-3.png', 'Peptides Spring Hydra-Gel Eye Patches – 60 pcs. ')">
    <img src="../../image/eye-Patches-peptides_Site-award-3.png" alt="Product C">
    <h3>10% PURE VITAMIN C SERUM</h3>
    <p>20$</p>
    <button class="add-to-bag-button" onclick="addToCart('Peptides Spring Hydra-Gel Eye Patches – 60 pcs.', 'eye-Patches-peptides_Site-award-3.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('Brightening_vitC_gel-cream_Site-2.png', 'Brightening Vit-C Gel Cream')">
    <img src="../../image/Brightening_vitC_gel-cream_Site-2.png" alt="Product C">
    <h3>Brightening Vit-C Gel Cream</h3>
    <p>27$</p>
    <button class="add-to-bag-button" onclick="addToCart('Brightening_vitC_gel-cream_Site-2.png', 'Brightening Vit-C Gel Cream')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Wrinkles-Cream-eyes_Site-1.png', 'Wrinkles Erasure Cream For Eyes')">
    <img src="../../image/Wrinkles-Cream-eyes_Site-1.png" alt="Product C">
    <h3>Wrinkles Erasure Cream For Eyes</h3>
    <p>37$</p>
    <button class="add-to-bag-button" onclick="addToCart('Wrinkles Erasure Cream For Eyes','Wrinkles-Cream-eyes_Site-1.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Daily-sunscreen-cream_Site-800x800.png', 'Daily Sunscreen Cream SPF 50')">
    <img src="../../image/Daily-sunscreen-cream_Site-800x800.png" alt="Product C">
    <h3>Daily Sunscreen Cream SPF 50</h3>
    <p>16.99$</p>
    <button class="add-to-bag-button" onclick="addToCart('Daily Sunscreen Cream SPF 50 ','Daily-sunscreen-cream_Site-800x800.png')">Add to Bag</button>
  </div>

 

  
</div>


<script>
  var cartCount = 0;
  var cartItems = [];

  function toggleCartMenu() {
    var cartMenu = document.getElementById('cart-menu');
    if (cartMenu.style.display === 'block') {
      cartMenu.style.display = 'none';
    } else {
      cartMenu.style.display = 'block';
    }
  }

  function addToCart(product, image) {
    cartItems.push({ product: product, image: image });
    cartCount++;
    document.getElementById('cart-count').textContent = cartCount;
    updateCartMenu();
  }

  function removeItem(index) {
    cartItems.splice(index, 1);
    cartCount--;
    document.getElementById('cart-count').textContent = cartCount;
    updateCartMenu();
  }

  function updateCartMenu() {
    var cartMenu = document.getElementById('cart-menu');
    cartMenu.innerHTML = '';
    if (cartCount === 0) {
      cartMenu.innerHTML = '<p>Your cart is empty.</p>';
    } else {
      for (var i = 0; i < cartItems.length; i++) {
        var item = cartItems[i];
        var cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
          <img src="${item.image}" alt="${item.product}">
          <p>${item.product}</p>
          <button onclick="removeItem(${i})">Remove</button>
        `;
        cartMenu.appendChild(cartItem);
      }
    }
  }
</script>
</body>
</html>
</body>
</html>