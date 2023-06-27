<?php
@include 'users/config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/styleCheckout.css">
  <script src="https://kit.fontawesome.com/132b724676.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
  <a href="index.php">
    <img src="image/Logo.png" alt="Logo" class="logo"></a>
    <img src="image/PharmaLineNameLogo.png" alt="" class="logo-name">

    <div class="header-icons">
      <img src="image/search.png" alt="Search" class="header-icon">
      <a href="users/login.php">
      <img src="image/user (1).png" alt="User" class="header-icon"></a>
      <img src="image/shopping-bag (1).png" alt="Shopping" class="header-icon">
      <a href="blogUser.php">
      <img src="image/blog1.png" alt="Shopping" class="header-icon"></a>   
    </div>
  
  </header>
   
  <div class="checkout container  mt-5">
      <h2 class="font-weight-bold">Checkout</h2>
      <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3 sticky-top">
                    <?php
                    // Sample product data
                    $products = array(
                        array("name" => "Product name", "description" => "Brief description", "price" => "$12"),
                        array("name" => "Second product", "description" => "Brief description", "price" => "$8"),
                        array("name" => "Third item", "description" => "Brief description", "price" => "$5")
                    );

                    // Iterate through products array
                    foreach ($products as $product) {
                        echo '<li class="list-group-item d-flex justify-content-between lh-condensed">';
                        echo '<div>';
                        echo '<h6 class="my-0">' . $product["name"] . '</h6>';
                        echo '<small class="text-muted">' . $product["description"] . '</small>';
                        echo '</div>';
                        echo '<span class="text-muted">' . $product["price"] . '</span>';
                        echo '</li>';
                    }
                    ?>

                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8 order-md-1">
                <form class="needs-validation" action="" method="post">
                    <div class="row">
                        <div class="mb-3">
                            <label for="firstName">Full Name</label>
                            <input type="text" class="form-control" id="firstName" name="name" placeholder="Enter your name" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" name="adress2" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" name="country" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" name="state" id="state" required>
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"  value="cash" checked required>
                            <label class="custom-control-label" for="credit">Cash on Delivery </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="credit card" checked required>
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" value="debit card" class="custom-control-input" required>
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" value="paypal" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
                </form>
            </div>
        </div>
    </div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4>About PharmaLine</h4>
        <p>PharmaLine is your best health partner, providing a wide range of health and beauty products to enhance your well-being.</p>
      </div>
      <div class="col-md-4">
        <h4>Quick Links</h4>
        <ul>
          <li>Home</a></li>
          <li>Shop</a></li>
          <li>Blog</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h4>Contact Information</h4>
        <p>123 Main Street, Tirane, Albania</p>
        <p>Email: info@pharmaline.com</p>
        <p>Phone: +1 123 456 7890</p>
      </div>
    </div>
    <div class="col-md-4">
    <div class="footer-section social">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>&copy; 2023 PharmaLine. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-l1swLpFWHjhg5I/9TehmPKWdbyHieplgrBDt8s7I0hi6XN+3b0GzJ0+Z7jT99w4e" crossorigin="anonymous"></script>
</body>
</html>
