<?php
         session_start();

          if(isset($_POST['submit'])){
          $email =$_POST['email'];
          $pass = $_POST['password'];

          require_once "config.php";

          $select = "SELECT * FROM user_form WHERE email='$email'";
  
          $result = mysqli_query($conn, $select);
          $user =  mysqli_fetch_array($result, MYSQLI_ASSOC);

          if($user){
            if(password_verify($pass, $user['password'])){
              
                if($user['user_type'] == 'admin'){
                $_SESSION['admin_id'] = $user['user_id'];
                header('Location: ../homePageAdmin.php');
  
                }elseif($user['user_type'] == 'user'){
                 $_SESSION['user_id'] = $user['user_id'];
                header('Location: ../index.php');
               }
            }
            else {
              echo '<div class="alert alert-danger">Passwrod does not match</div>';
            }
          }else{
            echo '<div class="alert alert-danger">Email does not match</div>';
          }
    }
          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Login</title>
</head>
<body>
<div id="loginFormOverlay" class="overlay">
    <div class="form-container">
      <h2>Log In</h2>
          <form action="" method="post">
             <input type="email" name="email" required placeholder="Email">
             <input type="password" name="password" required placeholder="Password">
          <input type="submit" name="submit" id="rbutton" value="Log in">
          <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
  </div>
</body>
</html>