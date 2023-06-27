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
  <title>Pharmaline - SkinCode Products</title>
  <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../assets/css/styleProductPage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
  
  .products{
       display: grid;
       grid-template-columns: repeat(3, 2fr);
       gap: 3rem;
       margin-bottom: 6rem;;
       margin-top: 20px;
       margin-left: 50px;
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
body {
    font-family: Arial, sans-serif;
    margin: 0;
     padding: 0;
     height: 100vh;
     width: auto;
  }
  
  header {
    background-color: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
  }
  
  .card{
    width: 200px;
    margin: 10px;
    padding: 10px;
    background-color: #f5f5f5; 
    text-align: center;
    cursor: pointer; /* Add cursor style for hover effect */
  }
  

  .icard-img-top{
    width: 150px;
    height: 150px;
    margin-bottom: 10px;
    margin-left: 60px;
  }

  .card-body{
    background-color: #f5f5f5;
  }
  
  .star{
    background-color: #ffffff;
  }
  
  
  .logo{
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
  body > div > div {
    margin-top: 65px;
}
body > header > div.cart-icon > a {
  margin-right: -300px;
}
body > header > div.logo {
    margin-left: -227px;
}
body > header > div.cart-icon > a > img {
    margin-left: 517px;
}
body > header > a > img {
    margin-left: -216px;
}
body > header > div.cart-icon > a > img {
    margin-left: 768px;
}
  </style>
  </head>

  <!--This is the body part-->  

<body>
<header>
<a href="../combinedpages.php">
    <img src="../../image/geekLogo.png" alt="Logo" class="logo"></a>
    <div class="header-text">
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
  </header>


  <!-- SkinCode Page -->
  <div class="container skin-code-page">
  <div class="products"> 
  <?php
         $select = "SELECT * FROM  products ORDER BY rand()";
         $result_query = mysqli_query($conn, $select);
         while( $row = mysqli_fetch_assoc($result_query)){
         if($row['category']=='skincare' && $row['brand']=='geekandgorgeus'){
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