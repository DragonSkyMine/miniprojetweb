<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
</head>
<body>
  <h1>Les différents flux</h1>
  <?php foreach ($data as $key => $value) {
    echo '<p>' . $value['url'];
  ?>
    <a href="../controler/afficher_nouvelles_img.ctrl.php?url=<?= $value['url'] ?>">
    <img style="  width: 20px;height: 20px;" src="../view/pic.png"></a></p>
  <?php
  } ?>
</body>
</html>
