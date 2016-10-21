<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="../view/afficher_nouvelles_img.view.css" charset="utf-8">
  <meta charset="utf-8">
</head>
<body>
  <header>
    <a href="../controler/afficher_flux.ctrl.php">
    <img class="back" src="../view/back.png"></a>
<?php
// Charge le flux depuis le réseau
$rss->update();

  // Affiche le titre
  echo "<br><h1>".$rss->getTitre()."</h1><br>"."</header>";

  // Affiche le titre et la description de toutes les nouvelles
  foreach($rss->getNouvelles() as $nouvelle) {
?>
    <div>
      <a href="<?= $nouvelle->getUrl() ?>">
        <img src=" <?= $nouvelle->getUrlImage() ?>"><br>
      </a>
    </div>
<?php
  }
?>
</body>
</html>
