<?php session_start();


$name = (isset($_POST['name'])) ? filter_var( $_POST['name'], FILTER_SANITIZE_STRING) : '';
$email = (isset($_POST['email'])) ? filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$address = (isset($_POST['address'])) ? filter_var($_POST['address'], FILTER_SANITIZE_STRING) : '';
$items = (isset($_POST['items'])) ? $_POST['items'] : '';
$city = (isset($_POST['city'])) ? filter_var( $_POST['city'], FILTER_SANITIZE_STRING) : '';
$state = $_POST['state'];
$zip = (isset($_POST['zip'])) ? filter_var( $_POST['zip'], FILTER_SANITIZE_STRING) : '';


if($name == '' || $email == '' || $address == '' || $items == '' || $city == '' || $zip == ''){
    $message = "<h1>We could not place your order.</br>Please try again</h1>";
} else {
    $message = "<h1>Thank You!</br>" .$name. "</br>For Your Order</h1><p></br><h4>Your items will be shipped to:</h4><br>".$address."</br>".$city.", ".$state." ".$zip."</p>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Nathan McCoard">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="prove03.css"/>

    <title>Thank You</title>
  </head>
  <body>
  <!-- Nav Bar Stuff -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
        <a class="navbar-brand" href="#"><img src="assets03/mccoard.png" alt="logo" style="width:150px;"></a>
  
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shoppingCart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Confirmation Page</a>
            </li>
        </ul>
    </nav>
    <div class="text-center">
        <?php echo $message ?>

        <table class="table table-striped table-bordered table-light cart-table">
            <thead class="thead-light">
                <tr>
                    <th colspan="6">Shopping Cart</th>
                </tr>
                <tr>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Line Item Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($_SESSION['cart'] as $key => $name) : ?>
                       <td><span class="align-middle"><?php echo $_SESSION['cart'][$key]['name']; ?></span></td>
                       <td><span class="align-middle">Qty: <?php echo $_SESSION['cart'][$key]['qty'];
                       ?></span></td>
                       <td><span class="float-right align-middle">$<?php echo ($_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['qty']); 
                       ?></span></td>
                      </tr>
                    <?php endforeach; 
                    ?>

                <tr>
                    <th></th>
                    <th></th>
                    <th id="total"><span class="float-right">Total: $<?php echo $_SESSION['total']; ?></span></th>
                </tr>
            </tbody>
        </table>

    </div>
    <footer class="container-fluid text-center">
        <div>© Nate M<sup>c</sup>Coard, 2020</div>
        <div>CSE341 Assignment #3</div>
        <div>Kirtland, OH</div>
    </footer>
    <?php 
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    ?>
  </body>
</html>