<?php
@include('users/config.php');
 $errors = array();

 if (isset($_POST['submit'])) {
  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
   $title = mysqli_real_escape_string($conn, $_POST['title']);
   $body = mysqli_real_escape_string($conn, $_POST['body']);
   $is_featured = isset($_POST['is_featured']) ? 1 : 0;
   $author = "PharmaLine";
   $thumbnail = $_FILES['thumbnail'];
   $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $is_featured = $is_featured == 1 ?: 0;

   // Check for empty values
   if (!$title) {
    $_SESSION['editPost'] = "Couldn't update post. Invalid form data on edit post page.";
    }elseif (!$body) {
    $_SESSION['editPost'] = "Couldn't update post. Invalid form data on edit post page.";
    } 

   else {
    // delete existing thumbnail if new thumbail is available
    if ($thumbnail['name']) {
        $previous_thumbnail_path = 'image/' . $previous_thumbnail_name;
        if ($previous_thumbnail_path) {
            unlink($previous_thumbnail_path);
        }

        // WORK ON NEW THUMBNAIL
        // Rename image
        $time = time(); // make each image name upload unique using current timestamp
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = 'image/' . $thumbnail_name;

    }
    if(count($errors)>0){
              foreach ($errors as $error) {
                echo '<div class="alert alert-danger">'.$error.'</div>';
              }
            }
    

    // set thumbnail name if a new one was uploaded, else keep old thumbnail name
    $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

    $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', is_featured=$is_featured WHERE id=$id";
    $result = mysqli_query($conn, $query);
    }
}
header('location: blogAdmin.php');

     
?>