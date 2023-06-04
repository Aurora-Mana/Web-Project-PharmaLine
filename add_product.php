<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $productName = $_POST['product-name'];
  $productPrice = $_POST['product-price'];
  $productDescription = $_POST['product-description'];
  $response = ['message' => 'Product added successfully'];
  echo json_encode($response);
}
?>
