<?php
    // Start the session
    session_start();

    $products = [
        "item1" => array('name' => 'Classic 4x4 Tee', 'price' => 21.49),
        "item2" => array('name' => 'Some Assembly Required Shirt', 'price' => 19.49),
        "item3" => array('name' => 'Roadkill and Mighty Car Modes Crossover Tee', 'price' => 22.99),
        "item4" => array('name' => 'Killer Motorhome Tee', 'price' => 21.49),
        "item5" => array('name' => 'Nascarlo Tee', 'price' => 21.49),
        "item6" => array('name' => 'Classic Roadkill Tee', 'price' => 19.99),
        "item7" => array('name' => 'Vintage Rotsun Tee', 'price' => 21.49)    
    ];
    

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
    <!-- Cart Contents -->
    <div class="theCart">
        <table class="table table-striped table-bordered table-light cart-table">
            <thead class="thead-light">
                <tr>
                    <th colspan="6">Shopping Cart</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Item Details</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th>Line Item Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $totalItems = 0;
                    foreach($_SESSION['cart'] as $key => $name) : ?>
                      <?php $url = "insideCart.php?id=".array_search($_SESSION['cart'][$key], $_SESSION['cart'])."&action=remove"; ?>
                      <tr name="<?php echo $_SESSION['cart'][$key]['name']; ?>row">
                        <td style="width: 150px"><button class="btn btn-outline-danger" colspan="2" onclick="window.location.href='<?php echo $url; ?>';">Remove</button></td>
                       <td><span class="align-middle"><?php echo $_SESSION['cart'][$key]['name']; ?></span></td>
                       <td><span class="float-right align-middle">$<?php echo $_SESSION['cart'][$key]['price']; ?></span></td>
                       <td><span class="align-middle">Qty: <?php echo $_SESSION['cart'][$key]['qty'];
                       $totalItems += $_SESSION['cart'][$key]['qty'] ?></span></td>
                       <td><span class="float-right align-middle">$<?php echo ($_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['qty']); 
                       $total += ($_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['qty']);?></span></td>
                      </tr>
                    <?php endforeach; 
                        $_SESSION['total'] = $total;
                    ?>

                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th id="qtyTotal"><span>Total items:<?php echo $totalItems; ?></span></th>
                    <th id="total"><span class="float-right">Total: $<?php echo $total; ?></span></th>
                </tr>
                <tr>
                    <th colspan="2"><button class="btn btn-info float-left" onclick="window.location.href='shop.php'">Continue Shopping</button></th>
                    <th></th>
                    <th></th>
                    <th><button class="btn btn-info float-right" onclick="window.location.href='checkout.php'">Checkout</button></th>
                </tr>
            </tbody>
        </table>
        <?php
            //echo var_dump($_SESSION['cart']);
            //echo var_dump($_SESSION['cost']);
        ?>

    </div>
    <footer class="container-fluid text-center">
        <div>© Nate M<sup>c</sup>Coard, 2020</div>
        <div>CSE341 Assignment #3</div>
        <div>Kirtland, OH</div>
    </footer>
    </body>

</html>