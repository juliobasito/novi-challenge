<?php
class StudentClass {

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

static function getClassById($classId) {
	$bdd = new PDO('mysql:host=localhost;dbname=novi','root','');

	$sql2='SELECT classId, className
        FROM class
        WHERE classid = :classid ';
        $sql = $db->prepare($sql2);
        $sql->bindParam(':classid', $classid);
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
  public static function getAllClass()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');
    $sql =$bdd->prepare('SELECT * FROM class');
    $sql->execute();
    return $sql;
  }
}
?>


