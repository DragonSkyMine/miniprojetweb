<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
</head>
<body>
  <h1>Différentes nouvelle du flux <?php echo $_GET['id']; ?></h1>
  <?php
    foreach ($res as $key => $value) {
      echo '<div><p>' . $value['titre'] . '</br>' . $value['description'] . '</p></div>';
    }
  ?>
</body>
