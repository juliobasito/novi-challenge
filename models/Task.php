<?php

include("bdd.php");
class Task {
  
static function getTaskByClassId($classId) {
  $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');

  $sql2='SELECT t.taskId TASKID, t.subjectId SUBJECTID, t.classId CLASSID, t.dateStart DATESTART, t.dateEnd DATEEND, s.subjectName SUBJECTNAME, s.teacherId TEACHERID
        FROM task t
        JOIN subject s 
        ON s.subjectId = t.subjectId
        WHERE classId = :classId ';
        $sql = $bdd->prepare($sql2);
        $sql->bindParam(':classId', $classId);
        $sql->execute();
        $task = 0;

      $compteur = 0;
			while($fetch = $sql->fetch())
			{
				 if($compteur==0)
			 {
				$task = array(
					"task".$compteur=> array(
						"taskId" => $fetch["TASKID"],
						"subjectId" => $fetch["SUBJECTID"],
						"classId" => $fetch["CLASSID"],
						"dateStart" => $fetch["DATESTART"],
						"dateEnd" => $fetch["DATEEND"],
						"subjectName" => $fetch["SUBJECTNAME"],
						"teacherId" => $fetch["TEACHERID"],
						));
				}
				else
				{
					$task = array_merge($task, array(
					$task = array(
					"task".$compteur=> array(
						"taskId" => $fetch["TASKID"],
						"subjectId" => $fetch["SUBJECTID"],
						"classId" => $fetch["CLASSID"],
						"dateStart" => $fetch["DATESTART"],
						"dateEnd" => $fetch["DATEEND"],
						"subjectName" => $fetch["SUBJECTNAME"],
						"teacherId" => $fetch["TEACHERID"],
						))));
				}
			$compteur++;
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


