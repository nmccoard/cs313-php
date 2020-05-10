<?php session_start()?>

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
                <a class="nav-link" href="shoppingCart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Checkout</a>
            </li>
        </ul>
    </nav>
    <div class="text-center">
        <form action="confirmPage.php" method="post">
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" class="form-control col-4 container-fluid" id="name" name="name" required>
            </div>
            <div class="form-group ">
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control col-4 container-fluid" id="inputAddress" name="address" placeholder="1234 Main St" required>
            </div>
                <div class="form-group">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control col-4 container-fluid" id="inputCity" name="city" required> 
                </div>
                <div class="form-group">
                    <label for="inputState">State</label>
                    <select id="inputState" name="state" class="form-control col-2 container-fluid" required>
                    <option selected disabled>Choose...</option>
                    <option>AL</option>
                    <option>AK</option>
                    <option>AZ</option>
                    <option>AR</option>
                    <option>CA</option>
                    <option>CO</option>
                    <option>CT</option>
                    <option>DE</option>
                    <option>FL</option>
                    <option>GA</option>
                    <option>HI</option>
                    <option>ID</option>
                    <option>IL</option>
                    <option>IN</option>
                    <option>IA</option>
                    <option>KS</option>
                    <option>KY</option>
                    <option>LA</option>
                    <option>ME</option>
                    <option>MD</option>
                    <option>MA</option>
                    <option>MI</option>
                    <option>MN</option>
                    <option>MS</option>
                    <option>MO</option>
                    <option>MT</option>
                    <option>NE</option>
                    <option>NV</option>
                    <option>NH</option>
                    <option>NJ</option>
                    <option>NM</option>
                    <option>NY</option>
                    <option>NC</option>
                    <option>ND</option>
                    <option>OH</option>
                    <option>OK</option>
                    <option>OR</option>
                    <option>PA</option>
                    <option>RI</option>
                    <option>SC</option>
                    <option>SD</option>
                    <option>TN</option>
                    <option>TX</option>
                    <option>UT</option>
                    <option>VT</option>
                    <option>VA</option>
                    <option>WA</option>
                    <option>WV</option>
                    <option>WI</option>
                    <option>WY</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control col-4 container-fluid" id="inputZip" name="zip" required>
                </div>
            <div class="form-group container-fluid">
                <label for="email">Email address:</label>
                <input type="email" class="form-control col-4 container-fluid" id="email" name="email" required>
                
                <input type="hidden" id="itemsSelected" name="items" value="<?php echo $_SESSION['cart'];?>">
            </div>
            <button class="btn btn-primary" onclick="window.location.href='shop.php'">Continue Shopping</button>
            <button type="submit" class="btn btn-success">Submit Order</button>
        </form>
    </div>
    <footer class="container-fluid text-center">
        <div>© Nate M<sup>c</sup>Coard, 2020</div>
        <div>CSE341 Assignment #3</div>
        <div>Kirtland, OH</div>
    </footer>
  </body>
</html>