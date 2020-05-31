<?php
   require_once "class-dbConnect.php";
   $db = Database::getInstance()->connection();

   $employeeNum = htmlspecialchars($_POST['employeeNum']);
   $fName = htmlspecialchars($_POST['fName']);
   $lName = htmlspecialchars($_POST['lName']);
   if($_POST['zone'] == 'North West'){
      $zone = 1;
   }
   elseif($_POST['zone'] == 'South West'){
      $zone = 2;
   }
   elseif($_POST['zone'] == 'North Central'){
      $zone = 3;
   }
   elseif($_POST['zone'] == 'South Central'){
      $zone = 4;
   }
   elseif($_POST['zone'] == 'North East'){
      $zone = 5;
   }
   elseif($_POST['zone'] == 'South East'){
      $zone = 6;
   }
   
   $db->beginTransaction();

   try {

      $stmt = $db->prepare('INSERT INTO student (employee_number, first_name, last_name, student_zone) VALUES (:employee_number, :first_name, :last_name, :student_zone);');

      $stmt->bindValue(':employee_number', $employeeNum, PDO::PARAM_INT);
      $stmt->bindValue(':first_name', $fName, PDO::PARAM_STR);
      $stmt->bindValue(':last_name', $lName, PDO::PARAM_STR);
      $stmt->bindValue(':student_zone', $zone, PDO::PARAM_INT);
      $stmt->execute();

      $db->commit();

   } catch (Exception $e) {
      echo $e->getLine() . ': ' . $e->getMessage();
      $db->rollback();
   }

   $new_page = "addStudent.php?studentBTN=";
   header("Location: $new_page");
?>