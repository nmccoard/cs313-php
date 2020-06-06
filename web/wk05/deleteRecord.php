<?php
   require_once "class-dbConnect.php";
   $db = Database::getInstance()->connection();

   $recordNum = htmlspecialchars($_POST['recordID']);

   $stmt = $db->prepare('DELETE FROM course_record WHERE id=:num;');
   
   $stmt->bindValue(':num', $recordNum, PDO::PARAM_INT);
   $stmt->execute();

   $new_page = "addRecord.php?recordBTN=";
   header("Location: $new_page");
?>