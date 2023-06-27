<?php
include '../../users/config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['add_to_cart'])){
$product_id = $row['product_id'];
$product_name = $row['product_name'];
$product_price = $row['price'];
$product_quantity = $row['quantity'];
$product_image = $row['image'];
$product_category = $row['category'];

$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name' AND user_id = '$user_id'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(user_id, product_id, product_name, price, image, quantity) VALUES('$user_id','$product_id','$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pharmaline - SkinCode Products</title>
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
    <div class="logo"> Geek & Gorgeous Products</div>
    <a href="../combinedpages.php">
    <img src="../../image/geekLogo.png" alt="Logo"></a>
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

    <div class="product-box" onclick="showProductDetails('CGlow-square-2023_360x.webp.png', ' C-Glow')">
      <img src="../../image/CGlow-square-2023_360x.webp.png" alt="Product.A">
      <h3> C-Glow</h3>
      <p>12.50$</p>
      <button class="add-to-bag-button" onclick="addToCart('C-Glow', 'CGlow-square-2023_360x.webp.png')">Add to Bag</button>
   </div>
       
   <div class="product-box" onclick="showProductDetails('BBomb-square-2023_360x.webp.png', 'B-BOMB ')">
    <img src="../../image/BBomb-square-2023_360x.webp.png" alt="Product B">
    <h3>B-BOMB</h3>
    <p>8.50$</p>
    <button class="add-to-bag-button" onclick="addToCart('B-BOMB ' , 'BBomb-square-2023_360x.webp.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('A-GAME-5-square_360x.webp.png', 'A-GAME 5')">
    <img src="../../image/A-GAME-5-square_360x.webp.png" alt="Product C">
    <h3>A-GAME 5</h3>
    <p>13.8$</p>
    <button class="add-to-bag-button" onclick="addToCart('A-GAME 5', 'A-GAME-5-square_360x.webp.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('A-GAME-10-square_360x.webp.png', 'A-GAME 10')">
    <img src="../../image/A-GAME-10-square_360x.webp.png" alt="Product C">
    <h3>A-GAME 10</h3>
    <p>18.80$</p>
    <button class="add-to-bag-button" onclick="addToCart('A-GAME 10', 'A-GAME-10-square_360x.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('aPAD-square-2023_360x.webp.png', 'aPAD')">
    <img src="../../image/aPAD-square-2023_360x.webp.png" alt="Product C">
    <h3>aPAD</h3>
    <p>11.80$</p>
    <button class="add-to-bag-button" onclick="addToCart('aPAD' , 'aPAD-square-2023_360x.webp.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('liquid-hydration-square_360x.webp.png', 'LIQUID HYDRATION ')">
    <img src="../../image/liquid-hydration-square_360x.webp.png" alt="Product C">
    <h3>LIQUID HYDRATION </h3>
    <p>10$</p>
    <button class="add-to-bag-button" onclick="addToCart('LIQUID HYDRATION', 'liquid-hydration-square_360x.webp.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('101_Jelly_Joker-square_360x.webp.png', 'JELLY JOKER')">
    <img src="../../image/101_Jelly_Joker-square_360x.webp.png" alt="Product C">
    <h3>JELLY JOKER </h3>
    <p>67$</p>
    <button class="add-to-bag-button" onclick="addToCart('101_Jelly_Joker-square_360x.webp.png', 'JELLY JOKER')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('cheer-up-square-2023_360x.webp.png', 'CHEER UP')">
    <img src="../../image/cheer-up-square-2023_360x.webp.png" alt="Product C">
    <h3>CHEER UP</h3>
    <p>28.50$</p>
    <button class="add-to-bag-button" onclick="addToCart('CHEER UP','cheer-up-square-2023_360x.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('calm-down-square-2023_360x.webp.png', 'CALMN DOWN')">
    <img src="../../image/calm-down-square-2023_360x.webp.png" alt="Product C">
    <h3>CALMN DOWN</h3>
    <p>23.80$</p>
    <button class="add-to-bag-button" onclick="addToCart('CALMN DOWN ','calm-down-square-2023_360x.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Happier-Barrier-Square_360x.webp.png', 'HAPPIER BARRIER')">
    <img src="../../image/Happier-Barrier-Square_360x.webp.png" alt="Product C">
    <h3>HAPPIER BARRIER</h3>
    <p>10$</p>
    <button class="add-to-bag-button" onclick="addToCart('HAPPIER BARRIER' ,'Happier-Barrier-Square_360x.webp.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('Smart-Age-Kit_360x.webp.png', 'SMART AGE KIT')">
    <img src="../../image/Smart-Age-Kit_360x.webp.png" alt="Product C">
    <h3>SMART AGE KIT</h3>
    <p>63.80$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'SMART AGE KIT','Smart-Age-Kit_360x.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('The-Gift-Kit_360x.webp.PNG', 'THE GIFT KIT')">
    <img src="../../image/The-Gift-Kit_360x.webp.PNG" alt="Product C">
    <h3>THE GIFT KIT</h3>
    <p>24.75$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'THE GIFT KIT','The-Gift-Kit_360x.webp.PNG')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('MM-squaremasolat_360x.webp.PNG', 'MIGHTY MELT')">
    <img src="../../image/MM-squaremasolat_360x.webp.PNG" alt="Product C">
    <h3>MIGHTY MELT</h3>
    <p>37$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'MIGHTY MELT','MM-squaremasolat_360x.webp.PNG')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Keep-Calm-Kit_360x.webp.PNG', 'KEEP CALM KIT')">
    <img src="../../image/Keep-Calm-Kit_360x.webp.PNG" alt="Product C">
    <h3>KEEP CALM KIT </h3>
    <p>49$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'KEEP CALM KIT','Keep-Calm-Kit_360x.webp.PNG')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('geeks-to-go_360x.webp.PNG', 'GEEKS TO GO')">
    <img src="../../image/geeks-to-go_360x.webp.PNG" alt="Product C">
    <h3>GEEKS TO GO</h3>
    <p>54$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'GEEKS TO GO','geeks-to-go_360x.webp.PNG')">Add to Bag</button>
  </div>

  
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