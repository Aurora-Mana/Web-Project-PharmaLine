<?php
@include('users/config.php');
$query = "SELECT id, title FROM posts ORDER BY id DESC";
$posts = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Managment</title>
    <link rel="stylesheet" href="./assets/css/styleBlogAdmin.css">
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


<section class="dashboard">
    <div class="container dashboard__container">
        <main>
          <div class = "post__add">
            <h2>Manage Posts</h2>
            <button> <img src="image/additionIcon.png" alt="" id="addPost"></button>
          </div>  
          <?php if (mysqli_num_rows($posts) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                  <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                    <tr>
                        <td><?=$post['title'] ?></td>
                        <td><a href="editPost.php?id=<?= $post['id'] ?>"  class="btn sm">Edit</a></td>
                        <td><a href="deletePost.php?id=<?= $post['id'] ?>" class="btn sm danger">Delete</a></td>
                    </tr>
                    <?php endwhile?>
                </tbody>
            </table>
            <?php else: ?>
              <div class ="alert__message error"><?= "No posts found" ?> </div>
            <?php endif?>
        </main>
    </div>
</section>


<script src="./assets/js/blogAdmin.js"></script>
</body>
</html>