<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nathan McCoard">
    <title>Nate's CSE341 Page</title>
    <link rel="stylesheet" href="homePage.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://beneposto.pl/jqueryrotate/js/jQueryRotateCompressed.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="homepage.js"></script>
</head>

<body>
    <div class="grid-container">
        <div class="item1">
            <div id="aboveNav">
                <img src="assets/mccoard.png" alt="McCoard Logo" id="logo">
            </div>
            <div id="navBar">
                <ul id="navList">
                    <li><a href="homepage.php" id="current">Home</a></li>
                    <li><a href="assignments.php">Assignment</a></li>
                    <li><a href="#">Coming Soon</a></li>
                </ul>
        </div>
        </div>
        <div id="main" class="item3">
            <h1>A little about me!</h1>
            <p>I like fixing things. Learning how different things works and then being able to fix them when they break or make improvement to them where I can, is what really makes me happy. It is one of those things, I think, really defines me an who I am. It is this very thing that has driven me to my current career inTechnical Training in the Biomedical field. I enjoyed my time of being a field service engineer but have come to love being a technical trainer that much more. Being able to share my passion for learning with others and then seeing other have those “oh ha” moments makes going to work enjoyable. This drive or passion for learning is what has brought me back to school and wanting to study software development. I like the idea of being able to write or manipulate lines of codes to make or change the way things work in our modern world. </p>
        </div>
        <div id="side" class="item4">
            <h3>Hopes and Dreams</h3>
            <p id="cap">I would love to build one of each of these</p>
        </div>
        <div id="pic1" class="item5"><img src="assets\fireChicken.jpg" alt="Supercharged 1971 Pontiac Firebird"></div>
        <div id="pic2" class="item6"><img src="assets\24-icon-49-mercury-coupe-ev.jpg"
                alt="1949 Mercury converted to Electric"></div> <!--picture courtesy of https://electrek.co/2018/10/31/1949-mercury-coupe-ev-conversion-tesla-powertrain/-->

        <footer class="item7">
            <div>© Nate M<sup>c</sup>Coard, <?php $mydate=getdate(date("U"));
                echo "$mydate[month], $mydate[year]";
                ?></div>
            <div>CSE341 Assignment #2</div>
            <div>Kirtland, OH</div>
        </footer>
    </div>
</body>

</html>