
<?php
// Test de la classe RSS
require_once('RSS.class.php');

// Une instance de RSS
$rss = new RSS('http://www.lemonde.fr/m-actu/rss_full.xml');

// Charge le flux depuis le réseau
$rss->update();

// Affiche le titre
echo $rss->getTitre()."<br>"."<br>";

// Affiche le titre et la description de toutes les nouvelles
foreach($rss->getNouvelles() as $nouvelle) {
  echo '<div style="border: 1px solid black;margin: auto;margin-bottom: 20px;background-color: #adbdd6;text-align: center;">';
  echo ' '.$nouvelle->getTitre().' '.$nouvelle->getDate()."<br>";
  echo '  '.$nouvelle->getDescription()."<br>";
  echo '<img src="'. $nouvelle->getUrlImage() . '"><br>';
  echo '</div>';
}
?>
