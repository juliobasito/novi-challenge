<?php 

echo "Bienvenue ".$profilName." élève de ".$class['className'];

$compteur=0;
foreach ($task as $key => $value) {
  echo "Projet de ".$value['subjectName'];
}

var_dump($task);
?>