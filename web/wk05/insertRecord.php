<?php
   require_once "class-dbConnect.php";
   $db = Database::getInstance()->connection();

   $courseCode = htmlspecialchars($_POST['courseCode']);
   $subject = htmlspecialchars($_POST['subject']);
   $studentID = htmlspecialchars($_POST['studentID']);
   $date = htmlspecialchars($_POST['date']);

   $db->beginTransaction();

   try {

      $stmt = $db->prepare('INSERT INTO course_record (course_code, course_id, student_id, course_end_date) VALUES (:course_code, :course_id, :student_id, :course_end_date);');

      $stmt->bindValue(':course_code', $courseCode, PDO::PARAM_STR);
      $stmt->bindValue(':course_id', $subject, PDO::PARAM_INT);
      $stmt->bindValue(':student_id', $studentID, PDO::PARAM_INT);
      $stmt->bindValue(':course_end_date', $date, PDO::PARAM_STR);
      $stmt->execute();

      $db->commit();

   } catch (Exception $e) {
      echo $e->getLine() . ': ' . $e->getMessage();
      $db->rollback();
   }

   $new_page = "addRecord.php?studentBTN=";
   header("Location: $new_page");
?>