<?php

include("bdd.php");
class Task {
  
  public static function getTaskByClassId($id)
  {
	$db = bdd::Conn();
	$sql = $db->prepare("SELECT * FROM Task WHERE taskId =:id");
	$sql->bindParam(":id",$id);
	$sql->execute();
	$columns = $sql->fetch();
	return $columns;
  }
}


?>


