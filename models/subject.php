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

}
?>