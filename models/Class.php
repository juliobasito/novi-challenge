<?php
class Class {

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

	$sql='SELECT classId, className
        FROM class
        WHERE classid = "'.$classId.'"
        AND password = "'.$_POST['password'].'"';
        $result = $bdd->prepare($sql);
        $columns = $result->execute();
        $columns = $result->fetch();
        $nb = $columns['nb'];
        if ($nb == 1) {
          session_start();
          $_SESSION['userid'] = $columns['userid'];
          $_SESSION['mail'] = $columns['mail'];
          $_SESSION['classid'] = $columns['classid'];
          return true;
        }
    return array(
      $_SESSION['utilisateur'],
      $_SESSION['id']

      );
  }

}
?>


