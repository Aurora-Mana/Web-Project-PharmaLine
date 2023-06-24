<?php
@include('users/config.php');

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $post = mysqli_fetch_assoc($result);
        $thumnbnail_name = $post['thumbnail'];
        $thumbnail_path = 'image/' . $thumnbnail_name;

        if($thumbnail_path){
            unlink($thumbnail_path);

            // deleting post from database
            $delete_post_query ="DELETE FROM posts WHERE id=$id";
            $delete_post_result = mysqli_query($conn, $delete_post_query);

            if(!mysqli_errno($conn)){
                $_SESSION['delete-post-success'] = "Post deleted successfully";
            }
        }
    }
}

header('location: blogAdmin.php');

?>