<?php
 @include('users/config.php');
 session_start();

// Fetch active codes from the database
$selectQuery = "SELECT * FROM discounts";
$result = mysqli_query($conn, $selectQuery);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Generate Discount</title>
        <link rel="stylesheet" type="text/css" href="assets/css/styleGenDis.css">
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
          <a href="../index.php">
          <i class="fa-solid fa-right-from-bracket" style="color: #222d3f;"></i>
          <span class="icon-name">Log Out</span></a>
        </div>
          </div>
        </div>
      </div>

      <div class="body-content">
      <form action="generateDiscount.php" enctype="multipart/form-data" method="post">
      
      <?php  
        if(isset($_POST['submit'])) {
          $code = $_POST['genreateField'];
          $discount = $_POST['discount'];
          $startDate = $_POST['startDate'];
          $endDate = $_POST['endDate'];
          
          $insertQuery = "INSERT INTO discounts (code, percentage, start_date, end_date) VALUES ('$code', '$discount', '$startDate', '$endDate')";
          mysqli_query($conn, $insertQuery);
          header('location: generateDiscount.php');

        }?>

        <div class="generate">
        <div class = "code">
        <input type="text" name ="genreateField" id="generateField">
        <button id="generateBtn">Generate</button>
        </div>
        <div class ="codeValue">
          <input type="radio" id="15" value="15" name="discount" required>
          <label for="15">15%</label><br>
          <input type="radio" id="20" value="20" name="discount" required>
          <label for="20">20%</label><br>
          <input type="radio" id="25" value="25" name="discount" required>
          <label for="25">25%</label>
          <input type="radio" id="50" value="50" name="discount" required>
          <label for="50">50%</label>
          <input type="radio" id="75" value="75" name="discount" required>
          <label for="75">75%</label>
        </div>
        <div class = "dates">
          <label for="startDate">Start date</label>
          <input type="date" name ="startDate" id="startDate" placeholder="Start Date"  required>
          <label for="endDate" id="endDateLabel">End date</label>
          <input type="date" name="endDate" id="endDate" placeholder="End Date"  required>
        </div>
        <div class = "activtion">
        <button type="submit" id="activateBtn" value="submit" name="submit">Activate Code</button>
        </div>
      </div>
      </form>

      <div class = "infoTable">
        <h3>Active codes</h3>
        <h5 class ="error"></h5>
      <table id="activationTable">
  <thead>
    <tr>
      <th>Code</th>
      <th>Discount</th>
      <th>Start Date</th>
      <th>End Date</th>
    </tr>
  </thead>
  <tbody>
    <?php while($code = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?php echo $code['code']; ?></td>
        <td><?php echo $code['percentage'] . "%"; ?></td>
        <td><?php echo $code['start_date']; ?></td>
        <td><?php echo $code['end_date']; ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
    </div>
    </div>
</body>
<script src="assets\js\generateDiscount.js"></script>



</html>