<?php

require_once "class-dbConnect.php";
$db = Database::getInstance()->connection();
$index = 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Nate McCoard">
   <title>Training Record Search</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
   <!-- Nav Bar Stuff -->
   <nav class="navbar justify-content-end navbar-expand-sm bg-dark navbar-dark sticky-top">
      <!-- Links -->
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link active" href="#">Search</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#">Data Entry</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#">Something Else</a>
         </li>
      </ul>
   </nav>
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <h1 class="display-4">Training Record Search</h1>
         <hr>
         <p class="lead">Add something witty here</p>
      </div>
   </div>

   <div class="container mb-2">
      <form>
         <div class="row mb-2">
            <div class="col">
               <label for="fName2">First Name:</label>
               <input class="form-control form-control-sm" type="text" placeholder="First Name" id="fName2"
                  name="fName">
            </div>
            <div class="col">
               <label for="lName2">Last Name:</label>
               <input class="form-control form-control-sm" type="text" placeholder="Last Name" id="lName2" name="lName">
            </div>
         </div>
         <div class="row mb-2">
            <div class="col">
               <label for="employeeNum2">Employee Number:</label>
               <input class="form-control form-control-sm mb-2" type="text" placeholder="123" id="employeeNum2"
                  name="employeeNum">
            </div>
         </div>
         <div id="row">
            <div class="col">
               <button type="submit" class="btn btn-warning mb-2" id="searchBTN" name="searchBTN">Search</button>
            </div>
         </div>
      </form>
   </div>
   <hr>
   <div class="container" id="results">
      <h3>Search results</h3>
      <?php  // Received Help from Nick Routsong for this part

// Completed Training Table Joining
if (isset($_GET['searchBTN'])){
$query  = 'SELECT * FROM course_record cr
            JOIN course c ON cr.course_id=c.id
            JOIN student s ON cr.student_id=s.id
            JOIN location l ON s.student_zone=l.id
            WHERE true';

// Array for Prepared Statement
$params = [];

if (isset($_GET['fName']) && !empty($_GET['fName'])) {
    $query  .= ' AND first_name = ?';
    $params[] = filter_var( $_GET['fName'], FILTER_SANITIZE_STRING);
}
if (isset($_GET['lName']) && !empty($_GET['lName'])) {
    $query  .= ' AND last_name = ?';
    $params[] = filter_var( $_GET['lName'], FILTER_SANITIZE_STRING);
}
if (isset($_GET['employeeNum']) && !empty($_GET['employeeNum'])) {
    $query  .= ' AND employee_number = ?';
    $params[] = filter_var( $_GET['employeeNum'], FILTER_SANITIZE_STRING);
}


$statement = $db->prepare( $query );
$statement->execute( $params );
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

}

?>
      <div>
         <table class="table table-striped table-bordered table-light">
            <thead class="thead-dark">
                <tr>
                    <th colspan="6"><h5>Completed Training:</h5></th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Employee Number</th>
                    <th>Zone</th>
                    <th>Class Subject</th>
                    <th>Course Code</th>
                    <th>Completion Date</th>
                </tr>
            </thead>
            <tbody>
            <?php        
               if (isset($_GET['searchBTN'])) :

               foreach($results as $result) : ?>
               <tr>
                  <td><?php echo $result['first_name'] . ' ' . $result['last_name'] ?></td>
                  <td><?php echo $result['employee_number'] ?></td>
                  <td><?php echo $result['zone'] ?></td>
                  <td><?php echo $result['equipment_type'] ?></td>
                  <td><?php echo $result['course_code'] ?></td>
                  <td><?php echo $result['course_end_date'] ?></td>
               </tr>

               <?php
                  $index = $index + 1; 
                  $courseArray[$index] = $result['course_id'];
                  $locationForEquipment = $result['student_zone']; 
                  endforeach; 

                  endif;
               ?>
            </tbody>
         </table>
      <?php
      $query2 = 'SELECT * FROM equipment e JOIN course c ON e.type=c.id WHERE location='.$locationForEquipment;
      foreach ($courseArray as $item){
         $query2 .= ' AND NOT type=' . $item;
      }

      $stmt = $db->prepare( $query2 );
      $stmt->execute();
      $results2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div>
         <table class="table table-striped table-bordered table-light">
            <thead class="thead-dark">
                <tr>
                    <th colspan="6"><h5>Required Training:</h5></th>
                </tr>
                <tr>
                    <th>Class Subject</th>
                    <th>Delivery Type</th>
                    <th>Class Description</th>
                </tr>
            </thead>
            <tbody>
            <?php  
               if (isset($_GET['searchBTN'])) :
      
               foreach($results2 as $result2) : 
            ?>
               <tr>
                  <td><?php echo $result2['equipment_type']; ?></td>
                  <td><?php echo $result2['delivery_type'] ?></td>
                  <td><?php echo $result2['description'] ?></td>
               </tr>
               <?php
                  endforeach; 

                  endif;
               ?>
            </tbody>
         </table>
      </div>
   </div>
   <hr>
   <footer class="container-fluid text-center">
      <div>© Nate M<sup>c</sup>Coard, 2020</div>
      <div>CSE341 Assignment #5</div>
      <div>Kirtland, OH</div>
   </footer>

</body>

</html>

