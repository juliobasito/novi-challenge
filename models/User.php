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
        WHERE mail = "'.$mail.'"
        AND password = "'.$password.'"';
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


static function getUserById($userId) {
  $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');

  $sql2='SELECT userId, mail, classId
        FROM user
        WHERE userId = :userId ';
        $sql = $db->prepare($sql2);
        $sql->bindParam(':userId', $userId);
        $sql->execute();
        $user=[];
      $fetch = $sql->fetch();
        $user = array(
          "user"=> array(
            "userId" => $fetch["userId"],
            "mail" => $fetch["mail"],
            "classId" => $fetch["classId"],
            ));

      return $user; 
  }




}
?>


