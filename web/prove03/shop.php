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
    <!-- Carousel courtesy of W3Schools.com -->
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets03/rotsun.png" alt="Rotsun Tee" width="350" height="390">
            </div>
            <div class="carousel-item">
                <img src="assets03/nascarlo.png" alt="Nascarlo Tee"width="350" height="390">
            </div>
            <div class="carousel-item">
                <img src="assets03/crossOver.png" alt="Roadkill and MCM Tee" width="350" height="390">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!-- Nav Bar Stuff -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <!-- Brand/logo -->
        <a class="navbar-brand" href="#"><img src="assets03/mccoard.png" alt="logo" style="width:150px;"></a>
  
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shoppingCart.php">Shopping Cart</a>
            </li>
        </ul>
    </nav>
    
    <!-- Main Content -->
    <div class="col-md-12 text-center">
        <h2 class="text-center">Vintage Tee</h2>
        <!--<form class="form-inline" action='shoppingCart.php' method='post'> -->
        <div class="row text-center">
            <div class="col-md-4">
                <img src="assets03/4x4.png" alt="Classic 4x4 tee shirt" class="images">
                <h4>4x4 Classic Tee</h4>
                <p class="price"> Price: $21.49</p>
                <button type="button" class="btn btn-warning" onclick="window.location.href='insideCart.php?id=item1&action=add';">Add to Cart</button>
            </div>

            <div class="col-md-4">
                <img src="assets03/roadKill.png" alt="Classic Roadkill tee shirt" class="images">
                <h4>Classic Roadkill Tee</h4>
                <p class="price"> Price: $19.99</p>
                <button type="button" class="btn btn-warning" onclick="window.location.href='insideCart.php?id=item6&action=add';">Add to Cart</button>
            </div>

            <div class="col-md-4">                
                <img src="assets03/motorHome.png" alt="Killer Motorhome tee shirt" class="images">
                <h4>Killer Motorhome Tee</h4>
                <p class="price"> Price: $21.49</p>
                <button type="button" class="btn btn-warning" onclick="window.location.href='insideCart.php?id=item4&action=add';">Add to Cart</button>
            </div>

            <div class="col-md-4">                
                <img src="assets03/rotsun.png" alt="Vintage Rotsun tee shirt" class="images">
                <h4>Vintage Rotsun Tee</h4>
                <p class="price"> Price: $22.49</p>
                <button type="button" class="btn btn-warning" onclick="window.location.href='insideCart.php?id=item7&action=add';">Add to Cart</button>
            </div>

            <div class="col-md-4">
                <img src="assets03/nascarlo.png" alt="The Nascarlo tee shirt" class="images">
                <h4>The Nascarlo Tee</h4>
                <p class="price"> Price: $21.49</p>
                <button type="button" class="btn btn-warning" onclick="window.location.href='insideCart.php?id=item5&action=add';">Add to Cart</button>
            </div>

            <div class="col-md-4">
                <img src="assets03/crossOver.png" alt="Roadkill and Mighty Car Modes Crossover tee shirt" class="images">
                <h4>Roadkill and Mighty Car Modes Crossover Tee</h4>
                <p class="price"> Price: $22.99</p>
                <button type="button" class="btn btn-warning" onclick="window.location.href='insideCart.php?id=item3&action=add';">Add to Cart</button>
            </div>
            
            <div class="col-md-4">                
                <img src="assets03/assembly.png" alt="Some Assembly Required tee shirt" class="images">
                <h4>Some Assembly Required Tee</h4>
                <p class="price"> Price: $19.49</p>
                <button type="button" class="btn btn-warning" onclick="window.location.href='insideCart.php?id=item2&action=add';">Add to Cart</button>
        </div>
        </form>
    </div>
    <footer class="container-fluid text-center">
        <div>© Nate M<sup>c</sup>Coard, 2020</div>
        <div>CSE341 Assignment #3</div>
        <div>Kirtland, OH</div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>    
  </body>
</html>