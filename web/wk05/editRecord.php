<?php

require_once "class-dbConnect.php";
$db = Database::getInstance()->connection();
$index = 0;

$query  = "SELECT * FROM student";
$params = [];

$statement  = $db->prepare($query);
$result     = $statement->execute($params);
$students   = $statement->fetchAll(PDO::FETCH_ASSOC);

$query2  = "SELECT * FROM course_record WHERE id=".$_POST['recordID'];
$params2 = [];

$statement  = $db->prepare($query2);
$result2    = $statement->execute($params2);
$records   = $statement->fetchAll(PDO::FETCH_ASSOC);

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
        <a class="nav-link active" href="addRecord.php">Add Training Records</a>
     </li>
  </ul>
  </header>
  <!-- Jumbotron -->
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <h1 class="display-4">Update a Training Record</h1>
         <hr>
         <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;The greatest teacher, failure is... - Yoda</p>
      </div>
   </div>
<!--  -Start of the Student Entry Form-  -->
   <div class="container mb-2">
      <form method="POST" action="updateRecord.php">
            <div class="col-3">
               <label for="courseCode">Course Code</label>
               <input class="form-control" type="text" value="<?php echo $records[0]['course_code'] ?>" id="courseCode" name="courseCode" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" required>
            </div>
            <div class="col-3">
               <label for="class">Subject:</label>
               <select id="class" class="form-control"  name="subject" required>
                  <option selected value="<?php echo $records[0]['course_id'] ?>">
                     <?php if($records[0]['course_id'] == 1){
                           echo "Steam Sterilizer";
                        } elseif ($records[0]['course_id'] == 2) {
                           echo "VPro";
                        } elseif ($records[0]['course_id'] == 3) {
                           echo "Washer Disinfector";
                        } elseif ($records[0]['course_id'] == 4) {
                           echo "Surgical Products";
                        } elseif ($records[0]['course_id'] == 5) {
                           echo "OR Integration";
                        }?>
                  </option>
                  <option value="1">Steam Sterilizer</option>
                  <option value="2">VPro</option>
                  <option value="3">Washer Disinfector</option>
                  <option value="4">Surgical Products</option>
                  <option value="5">OR Integration</option>
               </select>
            </div>
            <div class="col-3">
               <label for="studentID">Student:</label>
               <select id="studentID" class="form-control"  name="studentID" required>
                  <option selected value="<?php echo $records[0]['student_id'] ?>">
                     <?php echo $students[$records[0]['student_id']-1]['first_name'], " ",  $students[$records[0]['student_id']-1]['last_name'];?>
                  </option>
                  <?php foreach( $students as $student ) : ?>
                     <option value="<?php echo $student['id'];?>"><?php echo $student['first_name'], " ",  $student['last_name'];?></option>
                  <?php endforeach ?>
               </select>
            </div>          
            <div class="col-3">
               <label for="date">Date (YYYY-MM-DD):</label>
               <input class="form-control mb-2" type="text" value="<?php echo $records[0]['course_end_date'] ?>" id="date" name="date" required>
               <input type="hidden" value="<?php echo $_POST['recordID'] ?>" name="recordID" id="recordID">
            </div>
         </div>
         <div id="row mb-2">
            <div class="col-2">
               <button type="submit" class="btn btn-success mb-2 form-control" id="updateBTN" name="updateBTN">Submit Changes</button>
            </div>
         </div>
      </form>
      <form method="POST" action="deleteRecord.php">
      <div class="col-2">
         <input type="hidden" value="<?php echo $_POST['recordID'] ?>" name="recordID" id="recordID">
         <button type="submit" class="btn btn-danger mb-2" id="deleteBTN" name="deleteBTN">Delete Record</button>
      </div>
      </form>
      
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
            $("#updateBTN").show();
         } else {
            $(this).css('backgroundColor', "rgba(254, 0, 0, 0.25)");
            $("#updateBTN").hide();
         }
      });

   </script>

   </body>

</html>