<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../view/back_office.view.css" charset="utf-8">
  <meta charset="utf-8">
</head>
<body>
  <header>
    <a href="../controler/afficher_flux.ctrl.php">
    <img class="back" src="../view/back.png"></a>
    <h1>Gestion des flux</h1>
  </header>
  <form method="get" action="back_office.ctrl.php">
  <p>
    <input type="text" name="url"/><input type="hidden" name="cat" value="3" /><input type="submit" value="Ajouter"/>
  </p>
  </form>
  <ul>
    <?php
    foreach ($flux as $key => $value) {
      echo '<li><a href="../controler/back_office.ctrl.php?cat=2&url=' . $value['url'] . '"><img class="delete" src="../view/error.png"></a><p>' . $value['url'] . '<a href="../controler/back_office.ctrl.php?cat=1&url=' . $value['url'] . '"><img class="refresh" src="../view/refresh.png"></a><p></li>';
    }
    ?>
  </ul>
</body>
</html>
