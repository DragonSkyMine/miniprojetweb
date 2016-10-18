<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Test si l'URL existe dans la BD
$url = 'http://www.lemonde.fr/m-actu/rss_full.xml';

$rss = $dao->readRSSfromURL($url);
if ($rss == NULL) {
  echo $url." n'est pas connu\n";
  echo "On l'ajoute ... \n";
  $rss = $dao->createRSS($url);
}

$titre = 'Le studio Ghibli toujours en mode pause';
$RSS_id = 4;
$new = $dao->readNouvellefromTitre($titre,$RSS_id);
if ($new == NULL) {
  echo $titre . " avec rssId = " . $RSS_id . " n'est pas connu\n";
  echo "On l'ajoute ... \n";
  $toAdd = $rss->getNouvelles()['$titre'];
  $new = $dao->createNouvelle($toAdd, $RSS_id)
}

// Mise à jour du flux
$rss->update();
?>
