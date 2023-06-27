<?php

@include 'users/config.php';

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_keyword = $_POST['product_keyword'];
   $product_info = $_POST['product_info'];
   $product_price = $_POST['product_price'];
   $product_category = $_POST['category'];
   $product_brand = $_POST['brand'];
   $product_quantity = $_POST['product_quantity'];

   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'image/'.$product_image;
    

   if(empty($product_name) || empty($product_price) || empty($product_keyword) || empty($product_image) || empty($product_info) || empty($product_quantity) || empty($product_category) || empty($product_brand)){
      $message[] = 'please fill out all';
   }
   else{
    $insert = "INSERT INTO products (product_name, product_keyword, description, price, quantity, image, category, brand) VALUES ('$product_name', '$product_keyword', '$product_info', '$product_price', '$product_quantity', '$product_image', '$product_category', '$product_brand')";
    $upload = mysqli_query($conn, $insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE product_id = $id");
   header('location: manageProducts.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styleManageProducts.css">
    <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
    
</head>
<body>

  <div class="sidebar">
    <div class="icon-container">
      <div class="logo-sidebar">
        <img src="image/Logo.png" alt="Logo" class="logo">
        <img src="image/PharmaLineNameLogo.png" alt="Logo" class="nameLogo">
      </div>
      <div class="total-icons">

      <a href="homePageAdmin.php">
      <div class="icon" id="Home">
      <i class="fa-solid fa-house" style="color: #21324f;"></i>
      <span class="icon-name">Home</span>
      </a>
      </div>
     
   
        <div class="icon" id="Generate-discount">
         <a href="generateDiscount.php">
        <i class="fa-solid fa-tags" style="color: #0c182c;"></i>
          <span class="icon-name">Generate Discount</span>
         </a>
        </div>

      <a href="blogAdmin.php">
        <div class="icon" id="Blog">
          <i class="fas blog"></i>
          <img src="image/logoIcon.png" alt="Blog Icon">
          <span class="icon-name">Blog</span>
        </div>
      </a>
        <div class="icon" id="Manage Products">
        <a href="manageProducts.php">
        <i class="fa-solid fa-list-check" style="color: #25395b;"></i>
          <span class="icon-name">Manage Products</span>
         </a>
        </div>
        
        <div class="icon" id="Log-out">
          <a href="users/logout.php">
          <i class="fa-solid fa-right-from-bracket" style="color: #222d3f;"></i>
          <span class="icon-name">Log Out</span>
         </a>
        </div>
        </div>
    </div>
  </div>

  <?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
<div class="products">
  <div class="body-content">

    <div class="product-form-container">
      <form action="manageProducts.php" method="post" enctype="multipart/form-data">
        <h3>Add new products</h3>
        <input type="text" name="product_name" id="product_name" placeholder="Enter product name" class="box">
        <input type="text" name="product_keyword" id="product_keyword" placeholder="Enter product keywords" class="box">
        <input type="text" name="product_info" id="product_info" placeholder="Enter product information" class="box">
        <input type="text" name="category" id="category" placeholder="Enter product category" class="box">
        <input type="text" name="brand" id="brand" placeholder="Enter product brand" class="box">
        <input type="text" name="product_price" id="product_price" placeholder="Enter product price" class="box">
        <input type="number" name="product_quantity" id="product_quantity" placeholder="Enter product quantity" class="box">
        <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>
   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM products");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>product image</th>
            <th>product name</th>
            <th>product description</th>
            <th>product category</th>
            <th>product brand</th>
            <th>product quantity</th>
            <th>product price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="image/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
              <a href="productUpdate.php?edit=<?php echo $row['product_id']; ?>" class="btn"><i class="fas fa-edit"></i>edit</a>
              <a href="manageProducts.php?delete=<?php echo $row['product_id']; ?>" class="btn"> <i class="fas fa-trash"></i>delete </a>
            </td>
         </tr>
      <?php 
              }; 
         ?>
      </table>
   </div>
 </div>
</div>

</body>
</html>


























































































































































































































