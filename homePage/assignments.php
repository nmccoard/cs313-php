<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Nathan McCoard">
    <title>Nate McCoard's Assignments</title>
    <link rel="stylesheet" href="homePage.css"/>
</head>
<body>
    <div id="aboveNav">
        <h1 class="title">Assignments</h1>
    </div>
    <div id="navBar">
         <ul id="navList">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="assignments.php" id = "current">Assignment</a></li>
            <li><a href="#">Coming Soon</a></li>
        </ul>
    </div>
    <h2>Nate M<sup>c</sup>Coard</h2>
    <h3>CSE 341 Assignments</h3>
    <h3>
        <?php
            $today=getdate(date("U"));
            echo "$today[month] $today[mday], $today[year]";
        ?>
    </h3>
    <hr>
    <ul id="centeredList">
        <li class="inside"><a href="#">Coming Soon</a></li>
    </ul>

    <footer>
		<div>© Nate M<sup>c</sup>Coard, 2020</div>
		<div>CSE341 Assignment #2</div>
		<div>Kirtland, OH</div>
	</footer>
</body>
</html>