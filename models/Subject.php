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


static function getTaskByClassId($classId) {
  $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');

  $sql2='SELECT taskId, subjectId, classId, dateStart, dateEnd
        FROM task
        WHERE classId = :classId ';
        $sql = $bdd->prepare($sql2);
        $sql->bindParam(':classId', $classId);
        $sql->execute();
        $user=[];
      
      $compteur = 0;
			while($fetch = $sql->fetch())
			{
				 if($compteur==0)
			 {
				$task = array(
					"task".$compteur=> array(
						"taskId" => $fetch["taskId"],
						"subjectId" => $fetch["subjectId"],
						"classId" => $fetch["classId"],
						"dateStart" => $fetch["dateStart"],
						"dateEnd" => $fetch["dateEnd"],
						));
				}
				else
				{
					$task = array_merge($task, array(
					$task = array(
					"task".$compteur=> array(
						"taskId" => $fetch["taskId"],
						"subjectId" => $fetch["subjectId"],
						"classId" => $fetch["classId"],
						"dateStart" => $fetch["dateStart"],
						"dateEnd" => $fetch["dateEnd"]
						))));
				}
			$compteur++;
			}
        	
			return $task;

  }




}
?>


