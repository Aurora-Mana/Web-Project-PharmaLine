<?php

@include 'users/config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){
    $product_name = $_POST['product_name'];
    $product_info = $_POST['product_info'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_quantity = $_POST['product_quantity'];
 
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'image/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_category)|| empty($product_brand)){
      $message[] = 'please fill out all!';    
   }else{

    $update_data = "UPDATE products SET product_name=?, description=?, price=?, quantity=?, image=?, category=?, brand=? WHERE product_id=?";
    $stmt = mysqli_prepare($conn, $update_data);
    mysqli_stmt_bind_param($stmt, "ssdissi", $product_name, $product_info, $product_price, $product_quantity, $product_image, $product_category,$product_brand, $id);
    $upload = mysqli_stmt_execute($stmt);

    if ($upload) {
       move_uploaded_file($product_image_tmp_name, $product_image_folder);
       header('location: manageProducts.php');
    } else {
       $message[] = 'Failed to update the product!';
    }
 }
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
      
      <div class="icon" id="Home">
      <i class="fa-solid fa-house" style="color: #21324f;"></i>
      <a href="homePageAdmin.php">
          <span class="icon-name">Home</span></a>
        </div>
     
        
      <div class="icon" id="Check-sales">
        <i class="fa-solid fa-check-to-slot" style="color: #19263e;"></i>
          <span class="icon-name">Check Sales</span>
        </div>

        <div class="icon" id="Generate-discount">
        <i class="fa-solid fa-tags" style="color: #0c182c;"></i>
          <span class="icon-name">Generate Discount</span>
        </div>
        <div class="icon" id="Blog">
          <i class="fas blog"></i>
          <img src="image/logoIcon.png" alt="Blog Icon">
          <span class="icon-name">Blog</span>
        </div>

        <div class="icon" id="Manage Products">
        <a href="manageProducts.php">
        <i class="fa-solid fa-list-check" style="color: #25395b;"></i>
          <span class="icon-name">Manage Products</span></a>
        </div>
        
        <div class="icon" id="Log-out">
          <a href="users/logout.php">
          <i class="fa-solid fa-right-from-bracket" style="color: #222d3f;"></i>
          <span class="icon-name">Log Out</span></a>
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

<div class="body-content">

    <div class="product-form-container">
   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Update the product</h3>
      <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" placeholder="enter the product name" class="box" >
      <input type="text" name="product_info" value="<?php echo $row['description']; ?>" id="product_info" placeholder="Enter product information" class="box">
      <input type="number" name="product_quantity" value="<?php echo $row['quantity']; ?>" id="product_quantity" placeholder="Enter product quantity" class="box">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="text" name="category" value="<?php echo $row['category']; ?>" id="category" placeholder="Enter product category" class="box">
      <input type="text" name="brand" value="<?php echo $row['brand']; ?>" id="brand" placeholder="Enter product brand" class="box">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="manageProducts.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>
<script src="assets\js\homePageAdmin.js"></script>
</body>
</html>      