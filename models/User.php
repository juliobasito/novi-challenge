<?php
class User {




static function connect_user($mail, $password) {
  $db = bdd::Conn();

    if (isset($_POST["mail"]) && isset($_POST["password"])){
      if ($_POST['mail']!="" && $_POST['password']!="") {
        $sql='SELECT COUNT(*) AS nb, userid, mail, classid
        FROM user
        WHERE mail = "'.$mail.'"
        AND password = "'.$password.'"';
        $result = $db->prepare($sql);
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
  $db = bdd::Conn();

   $sql = $db->prepare('SELECT * FROM teacher WHERE mail = :mail AND password = :password');
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

  /*static function getUser() {
    return array(
      $_SESSION['utilisateur'],
      $_SESSION['id']

      );
  }*/


static function getUserById($userId) {
  $db = bdd::Conn();

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


