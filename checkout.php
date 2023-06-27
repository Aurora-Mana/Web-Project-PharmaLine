<?php
@include 'users/config.php';

session_start();

$loggedIn = false; // Initialize the variable as false

if (isset($_SESSION['user_id'])) {
    // User is logged in
    $loggedIn = true;
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
    header('location: users/login.php');
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $method = $_POST['paymentMethod'];
    $order_status = "on_hold";
    $order_date = date('Y-m-d H:i:s');

    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    $check_cart->bind_param("s", $user_id);
    $check_cart->execute();
    $result = $check_cart->get_result();
    $row_count = $result->num_rows;

    $total_price = 0;
    $product_name = array();
    if ($row_count > 0) {
        while ($product_item = mysqli_fetch_assoc($result)) {
            $product_name[] = $product_item['product_name'] . ' (' . $product_item['quantity'] . ') ';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $total_price += $product_price;
        }
    }

    $total_product = implode(', ', $product_name);

    if ($row_count > 0) {
        $detail_query = $conn->prepare("INSERT INTO orders (user_id, name, number, email, method, address, total_products, total_price, order_status, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $detail_query->bind_param("ssssssssss", $user_id, $name, $number, $email, $method, $address, $total_product, $total_price, $order_status, $order_date);
        $detail_query->execute();

        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart->bind_param("s", $user_id);
        $delete_cart->execute();
    }

    if ($detail_query) {
        echo "
            <div class='order-message-container'>
                <div class='message-container'>
                    <h3>Thank you for your purchase!</h3>
                </div>
                <a href='categories/combinedpages.php' class='btn'>Continue Shopping</a>
            </div>
        ";
    }
}
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
                <?php if ($loggedIn) { ?>
                  <a href="users/logout.php">
                  <img src="image/logout.png" alt="Logout" class="header-icon"></a>  
                  </a>
               <?php }; ?> 
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
                    <li class="list-group-item d-flex justify-content-between">
                        <?php
                        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'");
                        $total = 0;
                        $grand_total = 0;
                        if (mysqli_num_rows($select_cart) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                                $grand_total = $total += $total_price;
                        ?>
                                <span><?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                        <?php
                            }
                        } else {
                            echo "<div class='display-order'><span>your cart is empty!</span></div>";
                        }
                        ?>

                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong><span>$</span><?= $grand_total; ?>/- </strong>
                    </li>
            
                    <li class="list-group-item d-flex justify-content-between">
                        <div class="text-success">
                        <?php
                    if (isset($_POST['coupon_submit'])) {
                        $coupon_code = $_POST['coupon'];
                        $select_discount = mysqli_query($conn, "SELECT * FROM `discounts` WHERE `code` = '$coupon_code'");
                        if (mysqli_num_rows($select_discount) > 0) {
                        $fetch_discount = mysqli_fetch_assoc($select_discount);
                        $start_date = $fetch_discount['start_date'];
                        $end_date = $fetch_discount['end_date'];
                        $current_date = date('Y-m-d');
                        if ($current_date >= $start_date && $current_date <= $end_date) {
                           // Coupon is valid within the specified date range
                          $discount_amount = $fetch_discount['percentage'];
                          $total_discount = ($grand_total * $discount_amount) / 100;
                          $grand_total -= $total_discount;
                          echo "<div class='text-success'>";
                          echo "<h6 class='my-0'>Promo code discount</h6>";
                          echo "</div>";
                          echo "<span class='text-success'>-$" . $total_discount . "</span>";
                        } else {
                           // Coupon is expired
                           echo "<div class='text-danger'>";
                           echo "<h6 class='my-0'>Expired promo code</h6>";
                           echo "<small>" . $coupon_code . "</small>";
                            echo "</div>";
                         }
                       } else {
                      // Coupon code not found
                       echo "<div class='text-danger'>";
                    echo "<h6 class='my-0'>Invalid promo code</h6>";
                    echo "<small>" . $coupon_code . "</small>";
                      echo "</div>";
                           }
                        }
                    ?>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong><span>$</span><?= $grand_total; ?>/- </strong>
                </li>
            </ul>
            <form class="card p-2" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code" name="coupon">
                    <div class="input-group-append">
                        <button type="submit" name="coupon_submit" class="btn btn-secondary">Redeem</button>
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
                        <label for="number">Number</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="Enter your number" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
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
                        <label for="address2">Address 2</label>
                        <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="cash" checked required>
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
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Place Order</button>
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