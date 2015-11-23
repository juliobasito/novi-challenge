<?php
class User {

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



static function connect_user($mail, $password) {
  $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');

    if (isset($_POST["mail"]) && isset($_POST["password"])){
      if ($_POST['mail']!="" && $_POST['password']!="") {
        $sql='SELECT COUNT(*) AS nb, userid, mail, classid
        FROM user
        WHERE mail = "'.$_POST['mail'].'"
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
        }else{
          return false;
        }
      }
      return false;
    }
    return false;
  }

  static function getUser() {
    return array(
      $_SESSION['utilisateur'],
      $_SESSION['id']

      );
  }

}
?>


