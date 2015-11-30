<?php
class StudentClass {

public static function getClassById($classId) {
	$db = bdd::Conn();
	$sql2='SELECT classId, className
        FROM class
        WHERE classid = :classid ';
        $sql = $db->prepare($sql2);
        $sql->bindParam(':classid', $classId);
        $sql->execute();
        $class=[];
			$fetch = $sql->fetch();
				$class = array(
					"class"=> array(
						"classId" => $fetch["classId"],
						"className" => $fetch["className"],
						));

			return $class; 
  }

}
?>


