<?php
session_start();

if(isset($_POST['submit'])){
  $email = $_POST["email"];
  $pass = $_POST["password"];
  $user_type = $_POST["user_type"];

  $select = "SELECT * FROM user_form WHERE email='$email' AND user_type='$user_type'";
  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);

    if(password_verify($pass, $row['password'])){
      if($user_type == 'Admin'){
        $_SESSION['admin_email'] = $row['email'];
        header('location:../homePageAdmin.html');
      }
      elseif($user_type == 'Customer'){
        $_SESSION['customer_name'] = $row['full_name'];
        header('location:../index.php');
      }
      elseif($user_type == 'Clerk'){
        $_SESSION['clerk_name'] = $row['full_name'];
        header('location:../clerk1.html');
      }
      elseif($user_type == 'Manager'){
        $_SESSION['manager_name'] = $row['full_name'];
        header('location:../manager.php');
      }
    }
    else{
      $error[] = 'Incorrect email or password';
    }
  }
  else{
    $error[] = 'User does not exist';
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
      <h2>PharmaLine</h2>
      <form>
        <form action="index.php" method="post">
          <?php
          if(isset($error)){
            foreach ($error as $error) {
              echo '<div class="alert alert-danger">'.$error.'</div>';
            }
          }
          ?>
          <input type="email" placeholder="Email" required>
          <input type="password" placeholder="Password" required>
          <select name="user_type" class="form-select mb-3" aria-label="Default select example" required>
           <option selected disabled>Select User Type</option>
           <option value="Admin">Admin</option>
           <option value="Customer">Customer</option>
           <option value="Clerk">Clerk</option>
           <option value="Manager">Manager</option>
        </select>
          <input type="submit" name="submit" id="rbutton" value="Log in">
          <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
  </div>
</body>
</html>