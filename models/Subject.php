<?php
class Subject {

 public function db_connect() {

   try
   {
    $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');
    $bdd->query('SET NAMES utf8');
  }

  catch (Exception $e)
  {
    die('Erreur : ' .$e->getMessage());
  }
}


static function getSubjectById($subjectId) {
  $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');

  $sql2='SELECT subjectId, subjectName, teacherId
        FROM subject
        WHERE subjectId = :subjectId ';
        $sql = $bdd->prepare($sql2);
        $sql->bindParam(':subjectId', $subjectId);
        $sql->execute();
        $subject=[];
			$fetch = $sql->fetch();
				$subject = array(
						"subjectId" => $fetch["subjectId"],
						"subjectName" => $fetch["subjectName"],
						"teacherId" => $fetch["teacherId"],
						);
			
        	
			return $subject;

  }




}
?>


