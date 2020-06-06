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
 <header class="navbar navbar-expand flex-column flex-md-row bg-dark navbar-dark sticky-top">
  <div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
      <li class="nav-item">
         <img src="mccoard.png" alt="Logo" style="width:150px;"> 
      </li>
    </ul>
  </div>
  <!-- Links -->
  <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
     <li class="nav-item">
        <a class="nav-link" href="index.php">Search</a>
     </li>
     <li class="nav-item">
        <a class="nav-link active" href="#">Add New Students</a>
     </li>
     <li class="nav-item">
        <a class="nav-link" href="addRecord.php">Add Training Records</a>
     </li>
  </ul>
  </header>
  <!-- Jumbotron -->
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <h1 class="display-4">Student Enrollment Form</h1>
         <hr>
         <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;Always pass on what you have learned - Yoda</p>
      </div>
   </div>
<!--  -Start of the Student Entry Form-  -->
   <div class="container mb-2">
      <form method="POST" action="insertStudent.php">
         <div class="row mb-2">
            <div class="col-4">
               <label for="fName2">First Name:</label>
               <input class="form-control" type="text" placeholder="First Name" id="fName2" name="fName" pattern="[A-Z][a-zA-Z]{1,}" required>
            </div>
            <div class="col-4">
               <label for="lName2">Last Name:</label>
               <input class="form-control" type="text" placeholder="Last Name" id="lName2" name="lName" pattern="[A-Z][a-zA-Z]{1,}" required>
            </div>
         </div>
         <div class="row mb-2">
            <div class="col-3">
               <label for="employeeNum2">3 Digit Employee Number:</label>
               <input class="form-control mb-2" type="text" placeholder="123" id="employeeNum2" name="employeeNum" pattern="\d{3,6}" required>
            </div>
            <div class="col-3">
               <label for="zone2">Zone:</label>
               <select id="inputState" class="form-control" id="zone2" name="zone" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="North West">North West</option>
                  <option value="South West">South West</option>
                  <option value="North Central">North Central</option>
                  <option value="South Central">South Central</option>
                  <option value="North East">North East</option>
                  <option value="South East">South East</option>
               </select>
            </div>
         </div>
         <div id="row mb-2">
            <div class="col-2">
               <button type="submit" class="btn btn-success mb-2 form-control" id="searchBTN" name="searchBTN">Submit</button>
            </div>
         </div>
      </form>
      <form>
      <div class="col-3">
               <button type="submit" class="btn btn-primary mb-2 form-control" id="studentBTN" name="studentBTN">Load Current Students</button>
            </div>
      </form>
   </div>
   <hr>
   <?php
      $query = 'SELECT employee_number, first_name, last_name, zone FROM student s JOIN location l ON s.student_zone=l.id ORDER BY s.id DESC;';

      $stmt = $db->prepare( $query );
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (isset($_GET['studentBTN'])) :
   ?>
   <div class="container" id="results">
      <h3>Current Students</h3>
      <div>
         <table class="table table-striped table-bordered table-light">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Employee Number</th>
                    <th>Zone</th>
                </tr>
            </thead>
            <tbody>
            <?php        
               foreach($results as $result) : ?>
               <tr>
                  <td><?php echo $result['first_name'] . ' ' . $result['last_name'] ?></td>
                  <td><?php echo $result['employee_number'] ?></td>
                  <td><?php echo $result['zone'] ?></td>
               </tr>

               <?php
                  endforeach; 
               ?>
               <tr>
                  <td>
                     <p>Remove Student</p>
                  </td>
                  <form method="POST" action="deleteStudent.php">
                  <td>
                     <input class="form-control col-3" type="text" placeholder="Employee #" id="deleteNum" name="deleteNum" required>
                  </td>
                  <td>
                     <button type="submit" class="btn btn-danger mb-2 form-control" id="searchBTN" name="searchBTN">Delete</button>
                  </td>
                  </form> 
               </tr>              
            </tbody>

         </table>
   </div>
   <?php 
      endif; 
   ?>
   <footer class="container-fluid text-center bg-light">
      <hr>
      <div>© Nate M<sup>c</sup>Coard, 2020</div>
      <div>CSE341 Assignment #6</div>
      <div>Kirtland, OH</div>
   </footer>

</body>

</html>
