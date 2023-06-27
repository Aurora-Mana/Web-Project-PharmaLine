<?php
include 'users/config.php';
$select = mysqli_query($conn, "SELECT * FROM products");
$row = mysqli_fetch_assoc($select);
?>
<!DOCTYPE html>
<html>
<head>
  <title>PharmaLine - Product Description</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Add your custom styles here */

    /* Header */
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background-color: #f8f8f8;
    }

    .logo {
      width: 100px;
    }

    .header-text {
      font-size: 24px;
    }

    .header-icons {
      display: flex;
    }

    .header-icon {
      width: 30px;
      margin-left: 10px;
      cursor: pointer;
    }

    /* Product Description */
    .product-description {
      display: flex;
      margin-top: 50px;
      padding: 20px;
      text-align:left;
    }

    .product-image {
      flex: 0.5;
      position: relative;
    }

    .main-image {
      width: 100%;
      height: auto;
    }

    .image-slider {
      position: absolute;
      bottom: 10px;
      left: 10px;
      display: flex;
    }

    .slider-image {
      width: 50px;
      height: 50px;
      object-fit: cover;
      margin-right: 5px;
      cursor: pointer;
    }

    .product-details {
      flex: 1;
      margin-left: 20px;
    }

    .product-icon {
      width: 50px;
      height: auto;
    }

    .add-to-bag {
      display: block;
      width: 150px;
      height: 40px;
      margin-top: 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    /* Shopping Bag */
    .shopping-bag {
      display: none;
      position: fixed;
      top: 80px;
      right: 20px;
      width: 300px;
      padding: 20px;
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .shopping-bag-title {
      margin-bottom: 10px;
    }

    .shopping-bag-list {
      list-style-type: none;
      padding: 0;
    }

    .shopping-bag-item {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .item-image {
      width: 40px;
      height: auto;
      margin-right: 10px;
    }

    .checkout-button {
      display: none;
      width: 100%;
      margin-top: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 8px 12px;
      text-align: center;
      cursor: pointer;
    }

    /* Image Hover Effect */
    .thumbnail-image {
      display: none;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .product-image:hover .thumbnail-image {
      display: block;}

    .product-info {
      margin-top: 10px;
      height: 50px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    
    body > div.product-description > div.product-image {
    margin-top: 326px;
    
}
body > div.product-description > div.product-image {
    margin-left: 231px;
    font-weight: bold;
    margin-bottom: 0.5rem;
    word-break: break-word;
    color: inherit;

}
body > div.product-info > h3 {
    text-align: center;
    margin-top: 167px;
}
body > div.product-info > p:nth-child(2) {    
  margin: 5px 0 15px;
    font-size: 15px;
    line-height: 20px;
}
body > div.product-info {
  margin: 5px 0 15px;
    font-size: 15px;
    line-height: 20px;

}
body > div.product-info > p:nth-child(2) {
    margin: 5px 0 15px;
    font-size: 19px;
    line-height: 20px;
    margin-left: 37px;
}
body > div.product-info {
  margin: 5px 0 15px;
    font-size: 19px;
    line-height: 20px;
    margin-left: 37px;
}
body > div.product-info > h3:nth-child(1) {
  font-family:Copperplate Gothic Light;
  color:#261e5c;

}
body > div.product-info > h3:nth-child(3) {
    margin-top: 91px;
}
body > div.product-info > h3:nth-child(3) {
  font-family:Copperplate Gothic Light;
  color:#261e5c;

}
body > div.product-info {
  margin: 5px 0 15px;
    font-size: 19px;
    line-height: 20px;
    margin-left: 37px;
}
body > div.product-info > p:nth-child(2) {
  margin: 5px 0 15px;
    font-size: 19px;
    line-height: 20px;
    margin-left: 37px;
}
body > div.product-info > p:nth-child(2) {
    margin: 5px 0 15px;
    font-size: 19px;
    line-height: 20px;
    margin-left: 1px;
}



  </style>
</head>
<body>
  <header>
    <a href="categories/skincare/skincode.html">
    <img src="image/Logo.png" alt="Logo" class="logo"></a>
    <div class="header-text">
      <h1>PHARMALINE</h1>
    </div>
    <div class="header-icons">
      <img src="image/search.png" alt="Search" class="header-icon">
      <img src="image/user (1).png" alt="User" class="header-icon" onclick="showLoginForm()">
      <img src="image/shopping-bag (1).png" alt="Shopping" class="header-icon" onclick="toggleShoppingBag()">
    </div>
  </header>

  <div class="product-description">
    <div class="product-image">
      <div class="image-slider">
        <img src="image/images.jfif.png" alt="Product Image" class="main-image">
        <img src="image/Skincode_Essentials-Daily-Care_1002-3-Texture-300x300.jpg" alt="Image 1" class="slider-image thumbnail-image">
        <img src="image/image/skincode-essentials-hydro-repair-serum-500x500.webp.png" alt="Image 2" class="slider-image thumbnail-image">
        <img src="image/image/Smart-Age-Kit_360x.webp.png" alt="Image 3" class="slider-image thumbnail-image">
      </div>
    </div>
    <div class="product-details">
      <h2><?php echo $row['product_name'];?></h2>
      <img src="image/<?php echo $row['image']; ?>" alt="Product Icon" class="product-icon">
      <p>A water-activated cleansing foaming gel to gently regulate surface oil.</br>

        Skin Type: All skin types, especially normal to combination</br>
        Skincare Concern: Cleansing, removing impurities and controlling shine</br>
        Texture: Gel cleanser
      </br>
        Also available in XL (380ml).</p>
      <p>Price: $<?php $row['price'];?></p>
      <button class="add-to-bag" onclick="addToBag()">Add to Bag</button>
    </div>
  </div>

  <div class="shopping-bag" id="shoppingBag">
    <h3 class="shopping-bag-title">Shopping Bag</h3>
    <ul class="shopping-bag-list" id="shoppingBagList"></ul>
    <a href="checkout.html">
    <button class="checkout-button" id="checkoutButton">Checkout</button></a>
  </div>

  <div class="product-info">
    <h3>SKINCODE ESSENTIALS PURIFYING CLEANSING GEL</h3>
    <p><?php $row['description'];?></p>
    <p>The Purifying Cleansing Gel is ideal for removing excess oil, dirt and make-up. It deeply cleanses the skin, while regulating sebum secretion and respecting </br>the skin’s natural protective barrier.</br> This high-performance water-activated foaming cleansing gel rinses easily and leaves the skin completely cleansed and refreshed, without it feeling tight or dry.</br>It is formulated with the healing, soothing and regenerating properties of CM-Glucan, in addition to moisturizing Pro-Vitamin B5, calming Chamomile Extract,</br> anti-inflammatory Calendula Extract and oil production regulating Nettle Extract. Making it suitable for all skin types, especially normal and combination skin.
  

      <h3>SKINCODE ESSENTIALS DAILY CARE</h3>
          The Purifying Cleansing Gel is part of the Skincode Essentials Daily Care collection. A gentle, yet effective collection of skincare products suitable for all </br> skin types, even the most sensitive.</br> Skincode Essentials Daily Care offers complete skincare solutions to nourish, regenerate and protect the skin. The collection contains a sophisticated blend of </br>biotech ingredients, including a high percentage of the patented, medical grade active ingredient CM-Glucan. Used in dermatology to soothe, repair and regenerate </br>the skin.
      </p>
          All Skincode Essentials formulas are free from ingredients that could potentially cause skin allergies or irritation, unlocking the code to beautifully calm, comfortable and ageless skin.
      <ol>
      <li>Dermatologically tested</li> 
      <li>100% vegan and free from animal derived ingredients</li>
      <li>Free from: parabens, fragrance, preservatives and colorants</li>
    </p>
    </ol>
  </div>

  <script>
    var shoppingBag = document.getElementById('shoppingBag');
    var checkoutButton = document.getElementById('checkoutButton');

    function showLoginForm() {
      // Add your login form logic here
    }

    function toggleShoppingBag() {
      shoppingBag.style.display = shoppingBag.style.display === 'none' ? 'block' : 'none';
    }

    function addToBag() {
      var shoppingBagList = document.getElementById('shoppingBagList');
      var productName = 'Product Name';
      var productImage = 'images.jfif.png';

      var listItem = document.createElement('li');
      listItem.classList.add('shopping-bag-item');

      var image = document.createElement('img');
      image.src = productImage;
      image.alt = productName;
      image.classList.add('item-image');
      listItem.appendChild(image);

      var itemName = document.createElement('span');
      itemName.textContent = productName;
      listItem.appendChild(itemName);

      shoppingBagList.appendChild(listItem);

      // Show shopping bag and checkout button
      shoppingBag.style.display = 'block';
      checkoutButton.style.display = 'block';
    }
  </script>
</body>
</html>

























































































































































































































































































































