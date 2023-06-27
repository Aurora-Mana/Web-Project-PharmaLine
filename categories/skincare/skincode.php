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
      margin-left: 70px;
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
      margin-left: 50px;
      cursor: pointer;
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
        margin-left:10px;
        font-size: 20px;
      }

      .logo img {
     width: 75px;
     height: 75px;
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
    width: 60px;
    height: 50px;
    position: absolute;
}



  </style>
  </head>

  <!--This is the body part-->  

<body>
  <header class="header">
    <div class="logo">
      <a href="../combinedpages.php">
    <img src="../../image/download.png" alt="Logo"></a></div>
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
         if($row['category']=='skincare' && $row['brand']=='skincode'){
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

    <div class="product-box" onclick="showProductDetails('../../image/images.jfif.png', ' PURIFYING CLEANSING GEL')">
      <a href="../../product_description.html">
      <img src="../../image/images.jfif.png" alt="Product.A"></a>
      <h3> PURIFYING CLEANSING GEL</h3>
      <p>35$</p>
      <button class="add-to-bag-button" onclick="addToCart('PURIFYING CLEANSING GEL', 'images.jfif.png')">Add to Bag</button>
   </div>
       
   <div class="product-box" onclick="showProductDetails('8.SKINCODE-Firming-Eye-Zone-Gel.webp.png', 'FIRMING EYE ZONE GEL ')">
    <img src="../../image/8.SKINCODE-Firming-Eye-Zone-Gel.webp.png" alt="Product B">
    <h3>FIRMING EYE ZONE GEL  </h3>
    <p>47$</p>
    <button class="add-to-bag-button" onclick="addToCart('FIRMING EYE ZONE GEL ' , '8.SKINCODE-Firming-Eye-Zone-Gel.webp.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('Cellular-Anti-Aging-Cream.png', 'CELLULAR ANTI AGING CREAM')">
    <img src="../../image/Cellular-Anti-Aging-Cream.png" alt="Product C">
    <h3>CELLULAR ANTI AGING CREAM </h3>
    <p>43$</p>
    <button class="add-to-bag-button" onclick="addToCart('CELLULAR ANTI AGING CREAM', 'Cellular-Anti-Aging-Cream.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('Cellular-Power-Concentrate-2.png', 'CELLULAR POWER CONCENTRATE')">
    <img src="../../image/Cellular-Power-Concentrate-2.png" alt="Product C">
    <h3>CELLULAR POWER CONCENTRATE</h3>
    <p>54$</p>
    <button class="add-to-bag-button" onclick="addToCart('CELLULAR POWER CONCENTRATE', 'Cellular-Power-Concentrate-2.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('1535096295_front.webp.png', 'PURIFYING CLEANSING GEL')">
    <img src="../../image/1535096295_front.webp.png" alt="Product C">
    <h3>PURIFYING CLEANSING GEL </h3>
    <p>35$</p>
    <button class="add-to-bag-button" onclick="addToCart('PURIFYING CLEANSING GEL' , '1535096295_front.webp.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('24h-Cell-Energizer-Cream.png', '24h CELL ENERGIZER CREAM')">
    <img src="../../image/24h-Cell-Energizer-Cream.png" alt="Product C">
    <h3>24h CELL ENERGIZER CREAM </h3>
    <p>70$</p>
    <button class="add-to-bag-button" onclick="addToCart('24h CELL ENERGIZER CREAM', '24h-Cell-Energizer-Cream.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('skincode-essentials-hydro-repair-serum-500x500.webp.png', 'HYDRO REPAIR SERUM')">
    <img src="../../image/skincode-essentials-hydro-repair-serum-500x500.webp.png" alt="Product C">
    <h3>HYDRO REPAIR SERUM </h3>
    <p>67$</p>
    <button class="add-to-bag-button" onclick="addToCart('HYDRO REPAIR SERUM','skincode-essentials-hydro-repair-serum-500x500.webp.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Essentials-Daily-Care_1500-50ml-Sun-Protection-Face-Lotion_NP-300x300.png', 'SUN PROTECTION FACE LOTION SPF 50+')">
    <img src="../../image/Skincode_Essentials-Daily-Care_1500-50ml-Sun-Protection-Face-Lotion_NP-300x300.png" alt="Product C">
    <h3>SUN PROTECTION FACE LOTION SPF 50+</h3>
    <p>53$</p>
    <button class="add-to-bag-button" onclick="addToCart('SUN PROTECTION FACE LOTION SPF 50+','Skincode_Essentials-Daily-Care_1500-50ml-Sun-Protection-Face-Lotion_NP-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Exclusive_5005-Revitalizing-Toner_NP-300x300.png', 'CELLULAR REVITALIZING TONER')">
    <img src="../../image/Skincode_Exclusive_5005-Revitalizing-Toner_NP-300x300.png" alt="Product C">
    <h3>CELLULAR REVITALIZING TONER</h3>
    <p>47$</p>
    <button class="add-to-bag-button" onclick="addToCart('CELLULAR REVITALIZING TONER','Skincode_Exclusive_5005-Revitalizing-Toner_NP-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('5020_EXC_Cellular-Extreme-Moisture-Mask_Web_NP-300x300.png', 'CELLULAR EXTREME MOISTURE MASK')">
    <img src="../../image/5020_EXC_Cellular-Extreme-Moisture-Mask_Web_NP-300x300.png" alt="Product C">
    <h3>CELLULAR EXTREME MOISTURE MASK</h3>
    <p>57$</p>
    <button class="add-to-bag-button" onclick="addToCart('CELLULAR EXTREME MOISTURE MASK' ,'5020_EXC_Cellular-Extreme-Moisture-Mask_Web_NP-300x300.png')">Add to Bag</button>
  </div>


  <div class="product-box" onclick="showProductDetails('Skincode_Essentials-24h_1035-24h-Lip-Balm_NP-300x300.png', 'SUN PROTECTION FACE LOTION SPF 50+')">
    <img src="../../image/Skincode_Essentials-24h_1035-24h-Lip-Balm_NP-300x300.png" alt="Product C">
    <h3>24H INTENSIVE MOISTURIZING LIP BALM</h3>
    <p>15$</p>
    <button class="add-to-bag-button" onclick="addToCart( '24H INTENSIVE MOISTURIZING LIP BALM','Skincode_Essentials-24h_1035-24h-Lip-Balm_NP-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Essentials_Alpine-White_1600_Brightening-Day-Cream-SPF15-300x300.png', 'BRIGHTENING TOTAL CLARITY SERUM')">
    <img src="../../image/Skincode_Essentials_Alpine-White_1600_Brightening-Day-Cream-SPF15-300x300.png" alt="Product C">
    <h3>BRIGHTENING TOTAL CLARITY SERUM</h3>
    <p>27$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'BRIGHTENING TOTAL CLARITY SERUM','Skincode_Essentials_Alpine-White_1600_Brightening-Day-Cream-SPF15-300x300.png')">Add to Bag</button>
  </div>
  
  <div class="product-box" onclick="showProductDetails('Skincode_Essentials-Daily-Care_1018-Eye-Contour-Cream-NP-300x300.png', 'REVITALIZING EYE CONTOUR CREAM')">
    <img src="../../image/image/Skincode_Essentials-Daily-Care_1018-Eye-Contour-Cream-NP-300x300.png" alt="Product C">
    <h3>REVITALIZING EYE CONTOUR CREAM</h3>
    <p>37$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'REVITALIZING EYE CONTOUR CREAM','Skincode_Essentials-Daily-Care_1018-Eye-Contour-Cream-NP-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Essentials_S.O.S.-Oil-Control_1703-Pore-Refining-Mask_NP-1-300x300.png', 'PORE REFINING MASK')">
    <img src="../../image/Skincode_Essentials_S.O.S.-Oil-Control_1703-Pore-Refining-Mask_NP-1-300x300.png" alt="Product C">
    <h3>PORE REFINING MASK</h3>
    <p>49$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'PORE REFINING MASK','Skincode_Essentials_S.O.S.-Oil-Control_1703-Pore-Refining-Mask_NP-1-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Essentials_Kits_dream-destination-kit_1-1-300x300.png', 'DESTINATION DREAM SKIN')">
    <img src="../../image/Skincode_Essentials_Kits_dream-destination-kit_1-1-300x300.png" alt="Product C">
    <h3> DESTINATION DREAM SKIN</h3>
    <p>54$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'DESTINATION DREAM SKIN','Skincode_Essentials_Kits_dream-destination-kit_1-1-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('6001_PRESTIGE_Supreme-Perfection-Cashmere-Cream_NEW-300x300.png', 'SUPREME PERFECTION CASHMERE CREAM')">
    <img src="../../image/6001_PRESTIGE_Supreme-Perfection-Cashmere-Cream_NEW-300x300.png" alt="Product C">
    <h3> SUPREME PERFECTION CASHMERE CREAM</h3>
    <p>200$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'SUPREME PERFECTION CASHMERE CREAM','6001_PRESTIGE_Supreme-Perfection-Cashmere-Cream_NEW-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Exclusive_Kits_1283-Swiss-Skincare-Jewels-300x300.png', 'SWISS SKINCARE JEWELS ANTI-AGING COLLECTION')">
    <img src="../../image/Skincode_Exclusive_Kits_1283-Swiss-Skincare-Jewels-300x300.png" alt="Product C">
    <h3> SWISS SKINCARE JEWELS ANTI-AGING COLLECTION</h3>
    <p>124$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'SWISS SKINCARE JEWELS ANTI-AGING COLLECTION','Skincode_Exclusive_Kits_1283-Swiss-Skincare-Jewels-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Exclusive_5004-Cleansing-Milk_NP-300x300.png', 'CELLULAR CLEANSING MILK')">
    <img src="../../image/Skincode_Exclusive_5004-Cleansing-Milk_NP-300x300.png" alt="Product C">
    <h3> CELLULAR CLEANSING MILK</h3>
    <p>44$</p>
    <button class="add-to-bag-button" onclick="addToCart( 'CELLULAR CLEANSING MILK','Skincode_Exclusive_5004-Cleansing-Milk_NP-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Exclusive_5029-Pouch-5x-300x300.png', 'CELLULAR ANTI-AGING SHEET MASK')">
    <img src="../../image/Skincode_Exclusive_5029-Pouch-5x-300x300.png" alt="Product C">
    <h3> CELLULAR ANTI-AGING SHEET MASK</h3>
    <p>69$</p>
    <button class="add-to-bag-button" onclick="addToCart('CELLULAR ANTI-AGING SHEET MASK','Skincode_Exclusive_5029-Pouch-5x-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Exclusive_Kits_Ultimate-Anti-Aging-Trio-2-300x300.png', 'ULTIMATE ANTI-AGING TRIO LUXURY KIT')">
    <img src="../../image/Skincode_Exclusive_Kits_Ultimate-Anti-Aging-Trio-2-300x300.png" alt="Product C">
    <h3>ULTIMATE ANTI-AGING TRIO LUXURY KIT</h3>
    <p>173$</p>
    <button class="add-to-bag-button" onclick="addToCart('ULTIMATE ANTI-AGING TRIO LUXURY KIT','Skincode_Exclusive_Kits_Ultimate-Anti-Aging-Trio-2-300x300.png')">Add to Bag</button>
  </div>

  <div class="product-box" onclick="showProductDetails('Skincode_Exclusive_5019-EXC-Eye-Lift-Power-Pen_NP_NIF-300x300.png', 'CELLULAR EYE-LIFT POWER PEN')">
    <img src="../../image/Skincode_Exclusive_5019-EXC-Eye-Lift-Power-Pen_NP_NIF-300x300.png" alt="Product C">
    <h3>CELLULAR ANTI AGING CREAM </h3>
    <p>43$</p>
    <button class="add-to-bag-button" onclick="addToCart('CELLULAR EYE-LIFT POWER PEN', 'Skincode_Exclusive_5019-EXC-Eye-Lift-Power-Pen_NP_NIF-300x300.png')">Add to Bag</button>
  </div>
  <div class="product-box" onclick="showProductDetails('Skincode_Exclusive_5028-EXC-Overnight-Restoration-Oil-1-300x300.png', 'CELLULAR OVERNIGHT RESTORATION OIL')">
    <img src="../../image/Skincode_Exclusive_5028-EXC-Overnight-Restoration-Oil-1-300x300.png" alt="Product C">
    <h3>CELLULAR ANTI AGING CREAM </h3>
    <p>43$</p>
    <button class="add-to-bag-button" onclick="addToCart('CELLULAR OVERNIGHT RESTORATION OIL', 'Skincode_Exclusive_5028-EXC-Overnight-Restoration-Oil-1-300x300.png')">Add to Bag</button>
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