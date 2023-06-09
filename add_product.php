<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $productName = $_POST['product-name'];
  $productPrice = $_POST['product-price'];
  $productDescription = $_POST['product-description'];
  $response = ['message' => 'Product added successfully'];

$host = "localhost";
$dbname = "new_product";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$sql ="INSERT INTO product (productName,productPrice, producDescription) values ($productName, $productPrice,  $productDescriptio)";
$rs = mysqli_query($conn,$sql);


}

