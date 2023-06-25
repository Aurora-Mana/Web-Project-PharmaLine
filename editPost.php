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
          <i class="fas blog"></i>
          <img src="image/homeIcon.jpg" alt="Home Icon">
          <span class="icon-name">Home</span>
        </div>
        <div class="icon" id="Check-sales">
          <i class="fas check-sales"></i>
          <img src="image/revenueIcon.png" alt="Sales Icon">
          <span class="icon-name">Check Sales</span>
        </div>
        <div class="icon" id="Generate-discount">
          <i class="fas generate-dis"></i>
          <img src="image/generateCodeIcon.png" alt="Discount Icon">
          <span class="icon-name">Generate Discount</span>
        </div>
        <div class="icon" id="Log-out">
          <i class="fas log-out"></i>
          <img src="image/user (1).png" alt="Bottom Icon">
          <span class="icon-name">Log out</span>
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