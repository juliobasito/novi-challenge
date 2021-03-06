<?php
class User {



  static function deconnexion()
  {
    session_destroy();
  }
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
          $_SESSION['role'] = 3;
          return true;
        }else{
          return false;
        }
      }
      return false;
    }
    return false;
  }
  
  static function connect_admin($mail, $password) {
    $db = bdd::Conn();

    if (isset($_POST["mail"]) && isset($_POST["password"])){
      if ($_POST['mail']!="" && $_POST['password']!="") {
        $sql='SELECT COUNT(*) AS nb, adminId, mail, password
        FROM admin
        WHERE mail = "'.$mail.'"
        AND password = "'.$password.'"';
        $result = $db->prepare($sql);
        $columns = $result->execute();
        $columns = $result->fetch();
        $nb = $columns['nb'];
        if ($nb == 1) {
          session_start();
          $_SESSION['adminId'] = $columns['adminId'];
          $_SESSION['mail'] = $columns['mail'];
          $_SESSION['role'] = 1;
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
    echo "monnb".$nb;
    if($nb > 1)
    {
      session_start();
      $_SESSION['teacherId'] = $columns['teacherId'];
      $_SESSION['mail'] = $columns['mail'];
      $_SESSION['role'] = 2;
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

public static function listUser() {
	$db = bdd::Conn();
	$sql2 = "SELECT * FROM user";
	$sql = $db->prepare($sql2);
	$sql->execute();
	$tab = [];
  while($fetch = $sql->fetch())
  {
    $tab[] = $fetch;
  }
  return $tab;
}

public static function listTeacher() {
	$db = bdd::Conn();
	$sql2 = "SELECT * FROM teacher";
	$sql = $db->prepare($sql2);
	$sql->execute();
  $tab = [];
  while($fetch = $sql->fetch())
  {
    $tab[] = $fetch;
  }
  return $tab;
}

public static function listAdmin() {
  $db = bdd::Conn();
  $sql2 = "SELECT * FROM admin";
  $sql = $db->prepare($sql2);
  $sql->execute();
  $tab = [];
  while($fetch = $sql->fetch())
  {
    $tab[] = $fetch;
  }
  return $tab;
}

public static function addUser($mail, $password, $classId)
{
 $db = bdd::Conn();
 $sql = $db->prepare('SELECT count(mail) AS nb FROM user');
 $sql->execute();
 $before = $sql->fetch();
 $sql = $db->prepare('INSERT INTO user (mail, password, classId) VALUES (:mail, :password, :classId)');
 $flags = array('mail' => $mail , 'password'=>$password, 'classId'=>$classId);
 $sql->execute($flags);
 $sql2 = $db->prepare('SELECT count(mail) AS nb FROM user');
 $sql2->execute();
 $after = $sql2->fetch();
 if($before['nb'] < $after['nb'])
 {
  return 1;
}
return 0;
}
public static function addTeacher($mail, $password, $subject)
{
 $db = bdd::Conn();
 $sql = $db->prepare('SELECT count(mail) AS nb FROM teacher');
 $sql->execute();
 $before = $sql->fetch();
 $sql = $db->prepare('INSERT INTO teacher (mail, password) VALUES (:mail, :password)');
 $flags = array('mail' => $mail , 'password'=>$password);
 $sql->execute($flags);
 $sql2 = $db->prepare('SELECT count(mail) AS nb FROM teacher');
 $sql2->execute();
 $after = $sql2->fetch();
 if($before['nb'] < $after['nb'])
 {
  return 1;
}
return 0;
}
public static function addAdmin($mail, $password)
{
 $db = bdd::Conn();
 $sql = $db->prepare('SELECT count(mail) AS nb FROM admin');
 $sql->execute();
 $before = $sql->fetch();
 $sql = $db->prepare('INSERT INTO admin (mail, password) VALUES (:mail, :password)');
 $flags = array('mail' => $mail , 'password'=>$password);
 $sql->execute($flags);
 $sql2 = $db->prepare('SELECT count(mail) AS nb FROM admin');
 $sql2->execute();
 $after = $sql2->fetch();
 if($before['nb'] < $after['nb'])
 {
  return 1;
}
return 0;
}
public static function delUser($userId)
{
  $db = bdd::Conn();
  $sql = $db->prepare('DELETE FROM user WHERE userId = :userId');
  $flags = array('userId' =>$userId);
  $sql->execute($flags);
}

public static function delTeacher($teacherId)
{
  $db = bdd::Conn();
  $sql = $db->prepare('DELETE FROM teacher WHERE teacherId = :teacherId');
  $flags = array('teacherId' =>$teacherId);
  $sql->execute($flags);
}

public static function delAdmin($adminId)
{
  $db = bdd::Conn();
  $sql = $db->prepare('DELETE FROM admin WHERE adminId = :adminId');
  $flags = array('adminId' =>$adminId);
  $sql->execute($flags);
}
public static function updateAdmin($adminId, $password)
{
  $db = bdd::Conn();
  $sql = $db->prepare('UPDATE admin SET password = :password WHERE adminId = :adminId');
  $flags = array('password'=>$password, 'adminId'=>$adminId);
  $sql->execute($flags);
}
public static function updateTeacher($adminId, $password)
{
  $db = bdd::Conn();
  $sql = $db->prepare('UPDATE teacher SET password = :password WHERE teacherId = :adminId');
  $flags = array('password'=>$password, 'adminId'=>$adminId);
  $sql->execute($flags);
}
public static function updateUser($adminId, $password, $classId)
{
  $db = bdd::Conn();
  $sql = $db->prepare('UPDATE user SET password = :password, classId = :classId WHERE userId = :adminId');
  $flags = array('password'=>$password, 'adminId'=>$adminId, 'classId'=>$classId);
  $sql->execute($flags);
}
}
?>


