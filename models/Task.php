<?php
class Task {

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

public static function addTaskTeacher(){


}
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

}
?>


