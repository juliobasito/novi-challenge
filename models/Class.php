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
 public static function getAllClass()
 {
  $bdd = new PDO('mysql:host=localhost;dbname=novi','root','');
  $sql =$bdd->prepare('SELECT * FROM class');
  $sql->execute();
  $tab = [];
  while($fetch = $sql->fetch())
  {
    $tab[] = $fetch;
  }
  return $tab;
}
public static function addClass($className)
{
  $db = bdd::Conn();
  $sql = $db->prepare('SELECT count(*) AS nb FROM class');
  $sql->execute();
  $before = $sql->fetch();
  $before = $before['nb'];

  $sql = $db->prepare('INSERT INTO class (className) VALUES (:className)');
  $flags = array('className' => $className);
  $sql->execute($flags);

  $sql = $db->prepare('SELECT count(*) AS nb FROM class');
  $sql->execute();
  $after = $sql->fetch();
  $after = $after['nb'];

  if($after > $before)
  {
    return 1;
  }
  return 0;
}

public static function delClass($classId)
{
  $db = bdd::Conn();
  if($classId != 1)
  {
    $sql = $db->prepare('DELETE FROM class WHERE classId = :classId');
    $flags = array('classId' =>$classId);
    $sql->execute($flags);
    $sql = $db->prepare('UPDATE user SET classId = 1 WHERE classId = :classId');
    $sql->execute($flags);
  }
}
}
?>


