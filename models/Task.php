<?php

include("bdd.php");
class Task {
  
static function getTaskByClassId($classId) {
  $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');

  $sql2='SELECT *
        FROM task
        WHERE classId = :classId ';
        $sql = $bdd->prepare($sql2);
        $sql->bindParam(':classId', $classId);
        $sql->execute();
        $task = [];
			while($fetch = $sql->fetch())
			{
				$task[] = $fetch;
			}
        	
			return $task;

  }
 	public static function addTaskTeacher($subjectId, $classId, $dateStart, $dateEnd)
 	{
 		$bdd = new PDO('mysql:host=localhost;dbname=novi','root','');
 		$sql = $bdd->prepare('INSERT INTO task (subjectId, classId, dateStart, dateEnd) VALUES (:subjectId, :classId, :dateStart, :dateEnd)');
 		$flag = array('subjectId' => $subjectId , 'classId' => $classId, 'dateStart' => $dateStart, 'dateEnd' => $dateEnd) ;
 		$sql->execute($flag);
 	}
}
?>


