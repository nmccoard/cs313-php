<?php

require_once "class-dbConnect.php";
$db = Database::getInstance()->connection();
$index = 0;

$query  = "SELECT * FROM student";
$params = [];

$statement  = $db->prepare($query);
$result     = $statement->execute($params);
$students   = $statement->fetchAll(PDO::FETCH_ASSOC);

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
        <a class="nav-link" href="addStudent.php">Add New Students</a>
     </li>
     <li class="nav-item">
        <a class="nav-link active" href="#">Add Training Records</a>
     </li>
  </ul>
  </header>
  <!-- Jumbotron -->
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <h1 class="display-4">Training Record Form</h1>
         <hr>
         <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;It doesn't count until it been documented...</p>
      </div>
   </div>
<!--  -Start of the Student Entry Form-  -->
   <div class="container mb-2">
      <p>Use the form below to enter Individual Training Records<p>
      <hr>
      <form method="POST" action="insertRecord.php">
         <div class="row mb-2">
            <div class="col-4">
               <label for="courseCode">Course Code</label>
               <input class="form-control" type="text" placeholder="SQTS010-01" id="courseCode" name="courseCode" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" required>
            </div>
         </div>
         <div class="row mb-2">
            <div class="col-3">
               <label for="class">Subject:</label>
               <select id="class" class="form-control"  name="subject" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="1">Steam Sterilizer</option>
                  <option value="2">VPro</option>
                  <option value="3">Washer Disinfector</option>
                  <option value="4">Surgical Products</option>
                  <option value="5">OR Integration</option>
               </select>
            </div>
         </div>
         <div class="row mb-2"> 
            <div class="col-3">
               <label for="studentID">Student:</label>
               <select id="studentID" class="form-control"  name="studentID" required>
                  <option selected disabled value="">Choose...</option>
                  <?php foreach( $students as $student ) : ?>
                     <option value="<?php echo $student['id'];?>"><?php echo $student['first_name'], " ",  $student['last_name'];?></option>
                  <?php endforeach ?>
               </select>
            </div>
         </div> 
         <div class="row mb-2">          
            <div class="col-3">
               <label for="date">Date (YYYY-MM-DD):</label>
               <input class="form-control mb-2" type="text" placeholder="2001-01-01" id="date" name="date" required>
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
               <button type="submit" class="btn btn-primary mb-2 form-control" id="recordBTN" name="recordBTN">Load Training Records</button>
            </div>
      </form>
   </div>
   <hr>
   <?php
      $query2 = 'SELECT cr.id, course_id, course_code, course_end_date, first_name, last_name, employee_number FROM course_record cr JOIN student s ON cr.student_id=s.id ORDER BY cr.course_end_date DESC;';

      $stmt = $db->prepare( $query2 );
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (isset($_GET['recordBTN'])) :
   ?>
   <div>
      <table class="table table-striped table-bordered table-light">
         <thead class="thead-dark">
             <tr>
                 <th colspan="6"><h5>Completed Training:</h5></th>
             </tr>
             <tr>
                 <th>Course Code</th>
                 <th>Completion Date</th>
                 <th>Student Name</th>
                 <th>Employee Number</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
         <?php        
            foreach($results as $result) : ?>
               <tr>
                  <td><?php echo $result['course_code'] ?></td>
                  <td><?php echo $result['course_end_date'] ?></td>
                  <td><?php echo $result['first_name'] . ' ' . $result['last_name'] ?></td>
                  <td><?php echo $result['employee_number'] ?></td>
                  <td><form method="POST" action="editRecord.php" id="form<?php echo $result['id']; ?>">
                     <input type="hidden" value="<?php echo $result['id']; ?>" name="recordID">
                     <button type="submit" class="btn btn-warning mb-2" id="Submit<?php echo $result['id']; ?>" name="<?php echo $result['id']; ?>BTN">Update</button>
                  </form></td>
               </tr>   
         <?php
            endforeach; 
         ?>            
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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script type="text/javascript">
      $("#date").blur(function () {
         if (/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/.test($(this).val())) {
            $(this).css('backgroundColor', "rgba(255, 255, 255, 0.0)");
            $("#searchBTN").show();
         } else {
            $(this).css('backgroundColor', "rgba(254, 0, 0, 0.25)");
            $("#searchBTN").hide();
         }
      });
   </script>

   </body>

</html>
