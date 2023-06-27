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
  <title>Pharmaline - La Roche Posay Products</title>
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
    <div class="logo"> La Roche Posay Products</div>
    <a href="../combinedpages.php">
    <img src="../../image/la4169lce0-la-roche-posay-logo-la-roche-posay-logo-ufs-mount-gambier.png" alt="Logo"></a>
    <div class="cart-icon" onclick="toggleCartMenu()">
      < <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
      <a href="../../cart.php">
      <img src="../../image/shopping-bag (1).png" alt="Shopping" class="header-icon"> <span><?php echo $row_count; ?></span>
    </a>
    </div>
      <div id="image/cart-count" class="cart-count"></div>
      <div id="image/cart-menu" class="cart-menu"></div>
    </div>
  </header>

  <!-- SkinCode Page -->
  <div class="container skin-code-page">
  <div class="products"> 
  <?php
         $select = "SELECT * FROM  products ORDER BY rand()";
         $result_query = mysqli_query($conn, $select);
         while( $row = mysqli_fetch_assoc($result_query)){
         if($row['category']=='skincare' && $row['brand']=='larocheposay'){
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


    <div class="product-box" onclick="showProductDetails('01_Lipikar-oil-400ml-NEA - CORRECTED.webp.png', 'LIPIKAR AP+ GENTLE FOAMING CLEANSING OIL')">
      <img src="../../image/01_Lipikar-oil-400ml-NEA - CORRECTED.webp.png" alt="Product.A">
      <h3> LIPIKAR AP+ GENTLE FOAMING CLEANSING OIL</h3>
      <p>16.50$</p>
      <button class="add-to-bag-button" onclick="addToCart('LIPIKAR AP+ GENTLE FOAMING CLEANSING OIL', '01_Lipikar-oil-400ml-NEA - CORRECTED.webp.png')">Add to Bag</button>
   </div>
       
   <div class="product-box" onclick="showProductDetails('1-la-roche-posay-anthelios-70-uv-correct.webp.png', 'ANTHELIOS UV CORRECT FACE SUNSCREEN SPF 70 WITH NIACINAMIDE ')">
    <img src="../../image/BBomb-square-2023_360x.webp.png" alt="Product B">
    <h3>ANTHELIOS UV CORRECT FACE SUNSCREEN SPF 70 WITH NIACINAMIDE</h3>
    <p>8.50$</p>
    <button class="add-to-bag-button" onclick="addToCart('ANTHELIOS UV CORRECT FACE SUNSCREEN SPF 70 WITH NIACINAMIDE ' , '1-la-roche-posay-anthelios-70-uv-correct.webp.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('3337875583626-1_Glycolic-B5_30ml.png', 'HYALU B5 PURE HYALURONIC ACID SERUM')">
    <img src="../../image/3337875583626-1_Glycolic-B5_30ml.png" alt="Product C">
    <h3>HYALU B5 PURE HYALURONIC ACID SERUM</h3>
    <p>39$</p>
    <button class="add-to-bag-button" onclick="addToCart('HYALU B5 PURE HYALURONIC ACID SERUM', '3337875583626-1_Glycolic-B5_30ml.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('1_Toleriane_DblRepairMoisturizer_Tube.webp.png', 'TOLERIANE DOUBLE REPAIR FACE MOISTURIZER')">
    <img src="../../image/1_Toleriane_DblRepairMoisturizer_Tube.webp.png" alt="Product C">
    <h3>TOLERIANE DOUBLE REPAIR FACE MOISTURIZER</h3>
    <p>18.80$</p>
    <button class="add-to-bag-button" onclick="addToCart('TOLERIANE DOUBLE REPAIR FACE MOISTURIZER', '1_Toleriane_DblRepairMoisturizer_Tube.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Set01_anti-aging-serum.png', 'ANTI-AGING SERUM SET')">
    <img src="../../image/Set01_anti-aging-serum.png" alt="Product C">
    <h3>ANTI-AGING SERUM SET</h3>
    <p>110.47$</p>
    <button class="add-to-bag-button" onclick="addToCart('ANTI-AGING SERUM SET' , 'ANTI-AGING SERUM SET')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('pure-vitamin-c-serum-3337875660570-la-roche-posay.png', '10% PURE VITAMIN C SERUM ')">
    <img src="../../image/pure-vitamin-c-serum-3337875660570-la-roche-posay.png" alt="Product C">
    <h3>10% PURE VITAMIN C SERUM</h3>
    <p>20$</p>
    <button class="add-to-bag-button" onclick="addToCart('10% PURE VITAMIN C SERUM', 'pure-vitamin-c-serum-3337875660570-la-roche-posay.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('la-roche-posay-cicaplast-soothing-balm-dry-skin-irritations-3606000437449-1.webp.png', 'CICAPLAST BALM B5 FOR DRY SKIN IRRITATIONS')">
    <img src="../../image/la-roche-posay-cicaplast-soothing-balm-dry-skin-irritations-3606000437449-1.webp.png" alt="Product C">
    <h3>CICAPLAST BALM B5 FOR DRY SKIN IRRITATIONS </h3>
    <p>27$</p>
    <button class="add-to-bag-button" onclick="addToCart('la-roche-posay-cicaplast-soothing-balm-dry-skin-irritations-3606000437449-1.webp.png', 'CICAPLAST BALM B5 FOR DRY SKIN IRRITATIONS')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('effaclar-duo-acne-spot-treatment-883140500759-1.webp.png', 'EFFACLAR DUO ACNE SPOT TREATMENT')">
    <img src="../../image/effaclar-duo-acne-spot-treatment-883140500759-1.webp.png" alt="Product C">
    <h3>EFFACLAR DUO ACNE SPOT TREATMENT</h3>
    <p>37$</p>
    <button class="add-to-bag-button" onclick="addToCart('EFFACLAR DUO ACNE SPOT TREATMENT','effaclar-duo-acne-spot-treatment-883140500759-1.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('la-roche-posay-toleriane-cleanser-for-oily-skin-3337875545822-1.webp.png', 'TOLERIANE PURIFYING FOAMING FACIAL WASH')">
    <img src="../../image/la-roche-posay-toleriane-cleanser-for-oily-skin-3337875545822-1.webp.png" alt="Product C">
    <h3>TOLERIANE PURIFYING FOAMING FACIAL WASH</h3>
    <p>16.99$</p>
    <button class="add-to-bag-button" onclick="addToCart('TOLERIANE PURIFYING FOAMING FACIAL WASH ','la-roche-posay-toleriane-cleanser-for-oily-skin-3337875545822-1.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Happier-Barrier-Square_360x.webp.png', 'EFFACLAR GEL FACIAL WASH FOR OILY SKIN')">
    <img src="../../image/effaclar-facial-wash-for-oily-skin-3337872411991-1.png" alt="Product C">
    <h3>EFFACLAR GEL FACIAL WASH FOR OILY SKIN</h3>
    <p>22.99$</p>
    <button class="add-to-bag-button" onclick="addToCart('EFFACLAR GEL FACIAL WASH FOR OILY SKIN' ,'effaclar-facial-wash-for-oily-skin-3337872411991-1.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('1_Toleriane_Rosaliac-AR.webp.png', 'TOLERIANE ROSALIAC AR FACE CREAM FOR VISIBLE REDNESS')">
    <img src="../../image/1_Toleriane_Rosaliac-AR.webp.png" alt="Product C">
    <h3>TOLERIANE ROSALIAC AR FACE CREAM FOR VISIBLE REDNESS</h3>
    <p>30.99$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'TOLERIANE ROSALIAC AR FACE CREAM FOR VISIBLE REDNESS','1_Toleriane_Rosaliac-AR.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Set03-Cleanser-Redermic-AOX.png', 'ANTI-AGING ROUTINE SET')">
    <img src="../../image/Set03-Cleanser-Redermic-AOX.png" alt="Product C">
    <h3>ANTI-AGING ROUTINE SET</h3>
    <p>141.92$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'ANTI-AGING ROUTINE SET','Set03-Cleanser-Redermic-AOX.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('Virtual-Duos_set3.png', 'TOLERIANE HYDRATING CLEANSER & MOISTURIZER 2-PACK')">
    <img src="../../image/Virtual-Duos_set3.png" alt="Product C">
    <h3>TOLERIANE HYDRATING CLEANSER & MOISTURIZER 2-PACK</h3>
    <p>39.80$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'TOLERIANE HYDRATING CLEANSER & MOISTURIZER 2-PACK','Virtual-Duos_set3.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('1_Hydraphase-HA-Light.png', 'HYDRAPHASE HA LIGHT HYALURONIC ACID FACE MOISTURIZER')">
    <img src="../../image/1_Hydraphase-HA-Light.png" alt="Product C">
    <h3>HYDRAPHASE HA LIGHT HYALURONIC ACID FACE MOISTURIZER </h3>
    <p>39$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'HYDRAPHASE HA LIGHT HYALURONIC ACID FACE MOISTURIZER','1_Hydraphase-HA-Light.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('la-roche-posay-effaclar-micellar-water-for-oily-skin-3337872412516-1.png', 'EFFACLAR MICELLAR WATER FOR OILY SKIN')">
    <img src="../../image/la-roche-posay-effaclar-micellar-water-for-oily-skin-3337872412516-1.png" alt="Product C">
    <h3>EFFACLAR MICELLAR WATER FOR OILY SKIN</h3>
    <p>54$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'EFFACLAR MICELLAR WATER FOR OILY SKIN','la-roche-posay-effaclar-micellar-water-for-oily-skin-3337872412516-1.png')">Add to Bag</button>
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