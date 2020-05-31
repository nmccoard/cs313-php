<?php
   require_once "class-dbConnect.php";
   $db = Database::getInstance()->connection();

   $employeeNum = htmlspecialchars($_POST['deleteNum']);

   $stmt = $db->prepare('DELETE FROM student WHERE employee_number=:num;');
   
   $stmt->bindValue(':num', $employeeNum, PDO::PARAM_INT);
   $stmt->execute();

   $new_page = "addStudent.php";
   header("Location: $new_page");
?>
