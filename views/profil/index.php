<?php 
$prenom= explode(".", $_SESSION['mail']);
$rest = $prenom[1];
$nom = explode("@", $rest);
echo "Bienvenue ".ucfirst($prenom[0])." ".strtoupper($nom[0]);
?>