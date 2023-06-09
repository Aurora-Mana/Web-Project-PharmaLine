<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Register</title>
</head>
<body>
<div id="registerFormOverlay" class="overlay">
    <div class="form-container">
    <h2>Register</h2>

    <?php
          session_start();
          @include('config.php');
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
         if(isset($_POST['submit'])){
            $name = $_POST["fullname"];
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $cpass = $_POST["repeat_password"];
            $user_type = $_POST["user_type"];
            
             //encrypt the password to increase security using hash function
             $passwordHash = password_hash($pass,PASSWORD_DEFAULT);
            
            //Validation
            $errors = array();

            $select = "SELECT * FROM user_form WHERE email='$email' && password = '$pass'";
            $result = mysqli_query($conn, $select);

            //Check for empty values
            if(empty($name) OR empty($email) OR empty($pass) OR empty($cpass)){
                  array_push($errors, "All fields are required");    
            }

            //check if email provided is valid via filter function
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               array_push($errors, "Email is not valid");
            }
            //validate password
            if(strlen($pass)<8) {
              array_push($errors, "Password must be at least 8 characters long");
            }
            //if the repeated password is different from the first one given
            if($pass!==$cpass){
              array_push($errors, "Password does not match");
            }

             if(mysqli_num_rows($result)>0){
              array_push($errors, "User already exists");
             }

            //we need errors to be an empty array
            if(count($errors)>0){
              foreach ($errors as $error) {
                echo '<div class="alert alert-danger">'.$error.'</div>';
              }
            }
              else {

                $insert = "INSERT INTO user_form (full_name, email, password, user_type) VALUES ('$name', '$email', '$passwordHash', '$user_type')";
                mysqli_query($conn, $insert);
                header('location: login.php');
                
                  
              }
         }
      ?>
      <form action="register.php" method="post">
      
        <input type="text" name="fullname" required placeholder="Full Name">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <input type="password" name="repeat_password" required placeholder="Repeat Password">
        
         <select name="user_type" class="form-select mb-3" name="role" aria-label="Default select example" required>
          <option selected value="custumer">Customer</option>
          <option value="clerk">Clerk</option>
          <option value="manager">Manager</option>
          <option value="admin">Admin</option>
 
        </select>

        <input type="submit" name="submit" value="Register" id="rbutton">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>

</body>
</html>