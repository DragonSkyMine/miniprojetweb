<?php
// Test de la classe RSS
require_once('RSS.class.php');
require_once('Nouvelle.class.php');

// Une instance de RSS
$rss = new RSS('http://www.lemonde.fr/m-actu/rss_full.xml');

// Charge le flux depuis le réseau
$rss->update();

// Affiche le titre
<<<<<<< HEAD
echo $rss->getTitre()."\n";
=======
echo $rss->getTitre()."<br>"."<br>";
>>>>>>> f510f2eb29278d50f3dd73c028eb8b67e9adec15

// Affiche le titre et la description de toutes les nouvelles
foreach($rss->getNouvelles() as $nouvelle) {
  echo ' '.$nouvelle->getTitre().' '.$nouvelle->getDate()."\n";
  echo '  '.$nouvelle->getDescription()."\n";
}
?>
