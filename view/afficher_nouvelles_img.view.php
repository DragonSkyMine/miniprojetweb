<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
</head>
<body>
<?php
foreach ($flux as $key => $value) {
  // Une instance de RSS
  $rss = new RSS($value['url']);

  // Charge le flux depuis le réseau
  $rss->update();

  // Affiche le titre
  echo "<br>".$rss->getTitre()."<br>"."<br>";

  // Affiche le titre et la description de toutes les nouvelles
  foreach($rss->getNouvelles() as $nouvelle) {
?>
    <div style="display: inline-block;border: 1px solid black;margin: 5px">
    <a href="'.$nouvelle->getUrl().'">
    <img style="  width: auto;max-width:300px;height: auto;max-height:300px;" src=" <?= $nouvelle->getUrlImage() ?>"><br></a>
    </div>
<?php
  }
}
?>
</body>
</html>
