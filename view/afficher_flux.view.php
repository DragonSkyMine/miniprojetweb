<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="../view/afficher_flux.view.css" charset="utf-8">
  <meta charset="utf-8">
</head>
<body>
  <header>
  <h1>Les différents flux</h1>
  </header>
  <?php foreach ($data as $key => $value) {
    echo '<p>' . $value['url'];
  ?>
    <a href="../controler/afficher_nouvelles_img.ctrl.php?url=<?= $value['url'] ?>">
    <img src="../view/pic.png"></a></p>
  <?php
  } ?>
</body>
</html>
