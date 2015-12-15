<?php
class Subject {
	public static function getAllSubjectTeacher($teacherId)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=novi','root','');
		$sql =$bdd->prepare('SELECT * FROM subject WHERE teacherId = :teacherId');
		$flag = array('teacherId' =>$teacherId);
		$sql->execute($flag);
		$tab = [];
		while($fetch = $sql->fetch())
		{
			$tab[] = $fetch;
		}
		return $tab;
	}
	public static function getAllSubject()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=novi','root','');
		$sql =$bdd->prepare('SELECT * FROM subject');
		$sql->execute();
		$tab = [];
		while($fetch = $sql->fetch())
		{
			$tab[] = $fetch;
		}
		return $tab;
	}
	public static function getAllSubjectTeacherAndTaskAndClass($teacherId)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=novi','root','');
		$sql =$bdd->prepare('SELECT s.subjectId SubjectId, s.subjectName SubjectName, t.taskId TaskId, t.name Name, t.classId ClassId, c.className ClassName, t.dateStart DateStart, t.dateEnd DateEnd FROM subject s JOIN task t ON t.subjectId=s.subjectId JOIN class c ON c.classId=t.classId WHERE s.teacherId = :teacherId');
		$flag = array('teacherId' =>$teacherId);
		$sql->execute($flag);
		$tab = [];
		while($fetch = $sql->fetch())
		{
			$tab[] = $fetch;
		}
		return $tab;
	}
	public static function delSubject($subjectId)
	{
		$db = bdd::Conn();
		$sql = $db->prepare('DELETE FROM subject WHERE subjectId = :subjectId');
		$flag = array('subjectId' =>$subjectId);
		$sql->execute($flag);
	}
	public static function addSubject($subjectName, $teacherId)
	{
		$db = bdd::Conn();
		$sql = $db->prepare('INSERT INTO subject (subjectName, teacherId) VALUES (:subjectName, :teacherId)');
		$flag = array('subjectName' =>$subjectName, 'teacherId'=>$teacherId);
		$sql->execute($flag);
	}

}
?>