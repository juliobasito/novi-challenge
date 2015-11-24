<?php
class User {

 public function db_connect() {

   try
   {
    $bdd = new PDO('mysql:host=localhost;dbname=novy','root','');
    $bdd->query('SET NAMES utf8');
  }

  catch (Exception $e)
  {
    die('Erreur : ' .$e->getMessage());
  }
}



static function connect_user($mail, $password) {
  $bdd = new PDO('mysql:host=localhost;dbname=novy','root','');

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

  static function connect_teacher($mail, $password) {
  $bdd = new PDO('mysql:host=localhost;dbname=novy','root','');

   $sql = $bdd->prepare('SELECT * FROM teacher WHERE mail = :mail AND password = :password');
   $flag = array('mail' => $mail,
   'password' => $password);
   $sql->execute($flag);
   $columns = $sql->fetch();
   $nb = sizeof($columns);
   if($nb > 0)
   {
    session_start();
    $_SESSION['teacherId'] = $columns['teacherId'];
    $_SESSION['mail'] = $columns['mail'];
    $_SESSION['password'] = $columns['password'];
    return true;
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
        $sql = $bdd->prepare($sql2);
        $sql->bindParam(':userId', $userId);
        $sql->execute();
        $user=[];
      $fetch = $sql->fetch();
        $user = array(
         
            "userId" => $fetch["userId"],
            "mail" => $fetch["mail"],
            "classId" => $fetch["classId"],
            );

      return $user; 
  }




}
?>


