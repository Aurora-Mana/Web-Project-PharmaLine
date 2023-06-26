<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Add blog post</title>
    <link rel="stylesheet" href="./assets/css/styleBlogPostAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script> </head>
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
      <a href="#">
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
        
        <div class="icon" id="Log-out">
          <a href="users/logout.php">
          <i class="fa-solid fa-right-from-bracket" style="color: #222d3f;"></i>
          <span class="icon-name">Log Out</span></a>
        </div>
        </div>
    </div>
  </div>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
  
        <form action="blogPostAdmin.php" enctype="multipart/form-data" method="post">
        <?php
          @include('users/config.php');

          session_start();
          
          //Validation
          $errors = array();

          if (isset($_POST['submit'])) {
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $body = mysqli_real_escape_string($conn, $_POST['body']);
            $is_featured = isset($_POST['is_featured']) ? 1 : 0;
            $author = "PharmaLine";
            $is_featured = $is_featured == 1 ?: 0;

            // Check for empty values
            if (empty($title) || empty($body)) {
                $errors[] = "All fields are required to be filled";
            }
        
            // Validate thumbnail upload
            if ($_FILES['thumbnail']['error'] !== UPLOAD_ERR_OK) {
                $errors[] = "Thumbnail upload failed. Please try again.";
            }

            if(count($errors)>0){
              foreach ($errors as $error) {
                echo '<div class="alert alert-danger">'.$error.'</div>';
              }
            }
        
            // If there are no validation errors
           else {
                $thumbnail = $_FILES['thumbnail'];
                $thumbnail_name = $thumbnail['name'];
                $thumbnail_tmp = $thumbnail['tmp_name'];
                $thumbnail_path = 'image/' . $thumbnail_name;
                move_uploaded_file($thumbnail_tmp, $thumbnail_path);
        
                // Insert the data into the database
                $insert = "INSERT INTO posts (title, body, thumbnail, date_time, author_id, is_featured) 
                           VALUES ('$title', '$body', '$thumbnail_path', NOW(), 'PharmaLine', '$is_featured')";
                mysqli_query($conn, $insert);
                header('location: blogAdmin.php');
                
            }
        }
                 
      ?>
            <input type="text" name="title" placeholder="Title">
            <textarea rows="10" name = "body" placeholder="Body"></textarea>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is_featured">
                <label for="is_featured">Featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" class="btn-a" name="submit" value="submit">Add Post</button>
        </form>
    </div>
</section>
</body>
<script src = "assets/js/blogPostAdmin.js"></script>
</html>