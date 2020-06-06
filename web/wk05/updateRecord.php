<?php
   require_once "class-dbConnect.php";
   $db = Database::getInstance()->connection();

   $courseCode = htmlspecialchars($_POST['courseCode']);
   $subject = htmlspecialchars($_POST['subject']);
   $studentID = htmlspecialchars($_POST['studentID']);
   $date = htmlspecialchars($_POST['date']);
   $recordID = htmlspecialchars($_POST['recordID']);

   $db->beginTransaction();

   try {

      $stmt = $db->prepare('UPDATE course_record SET course_code = :course_code, course_id = :course_id, student_id = :student_id, course_end_date = :course_end_date WHERE id = :id;');

      $stmt->bindValue(':course_code', $courseCode, PDO::PARAM_STR);
      $stmt->bindValue(':course_id', $subject, PDO::PARAM_INT);
      $stmt->bindValue(':student_id', $studentID, PDO::PARAM_INT);
      $stmt->bindValue(':course_end_date', $date, PDO::PARAM_STR);
      $stmt->bindValue(':id', $recordID, PDO::PARAM_INT);
      $stmt->execute();

      $db->commit();

   } catch (Exception $e) {
      echo $e->getLine() . ': ' . $e->getMessage();
      $db->rollback();
   }

   $new_page = "addRecord.php?studentBTN=";
   header("Location: $new_page");
?>