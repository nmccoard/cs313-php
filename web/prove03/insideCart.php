<?php
    // Start the session
    session_start();

    $products = [
        "item1" => array('name' => 'Classic 4x4 Tee', 'price' => 21.49, 'qty' => 1),
        "item2" => array('name' => 'Some Assembly Required Shirt', 'price' => 19.49, 'qty' => 1),
        "item3" => array('name' => 'Roadkill and Mighty Car Modes Crossover Tee', 'price' => 22.99, 'qty' => 1),
        "item4" => array('name' => 'Killer Motorhome Tee', 'price' => 21.49, 'qty' => 1),
        "item5" => array('name' => 'Nascarlo Tee', 'price' => 21.49, 'qty' => 1),
        "item6" => array('name' => 'Classic Roadkill Tee', 'price' => 19.99, 'qty' => 1),
        "item7" => array('name' => 'Vintage Rotsun Tee', 'price' => 21.49, 'qty' => 1)    
    ];

    $item = (isset($_GET['id']) && in_array($_GET['id'], array_keys($products)) ? $products[$_GET['id']] : '');
    if ($_GET['action'] == "add"){
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            array_push($_SESSION['cart'], $item);
        } else {
            if(in_array($item, $_SESSION['cart'])){
                $index = array_search($item, ($_SESSION['cart']));
                $_SESSION['cart'][$index]['qty'] += 1;
            } else {
                array_push($_SESSION['cart'], $item);
            }
        }
        $message = "<h1>A Product was added to the cart</h1>";
    } elseif ($_GET['action'] == 'remove'){
        unset($_SESSION['cart'][$_GET['id']]);
        $message = "<h1>Item has been removed from the cart</h1>";
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Nathan McCoard">
    <!-- Set page to auto redirect to the Shop page -->
    <meta http-equiv="refresh" content="1; URL='shop.php'" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="prove03.css"/>

    <title>Nate -O- Mart</title>
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
                <a class="nav-link active" href="shoppingCart.php">Shopping Cart</a>
            </li>
        </ul>
    </nav>
    <div>
        <?php echo $message ?>
    </div>
    <footer class="container-fluid text-center">
        <div>© Nate M<sup>c</sup>Coard, 2020</div>
        <div>CSE341 Assignment #3</div>
        <div>Kirtland, OH</div>
    </footer>
    </body>
</html>