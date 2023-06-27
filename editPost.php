<?php
@include('users/config.php');
if(isset($_GET ['id'])){
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM posts WHERE id=$id";
  $result = mysqli_query($conn, $query);
  $post = mysqli_fetch_assoc($result);
  }
  else{
     header('location: blogAdmin.php');
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Add blog post</title>
    <link rel="stylesheet" href="./assets/css/styleBlogPostAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
      <a href="homePageAdmin.php">
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



<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
  
        <form action="editPostLogic.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
            
            <input type="text" value = "<?= $post['title'] ?>" name="title" placeholder="Title">
            <textarea rows="10" name = "body" placeholder="Body"> <?= $post['body'] ?></textarea>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is_featured" <?= $post['is_featured'] ? 'checked' : ''?>>
                <label for="is_featured">Featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" class="btn-a" name="submit" value="submit">Save</button>
        </form>
    </div>
</section>
</body>
<script src = "assets/js/blogPostAdmin.js"></script>
</html>