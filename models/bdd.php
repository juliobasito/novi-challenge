<?php

require_once('autoload.inc.php');

class bdd{


	public static function Conn() {

   try
   {
    $bdd = new PDO('mysql:host=localhost;dbname=novy','root','');
    $bdd->query('SET NAMES utf8');
	return $bdd;
  }

  catch (Exception $e)
  {
    die('Erreur : ' .$e->getMessage());
  }
  }
}

?>