<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <ul>
    <?php
    foreach ($flux as $key => $value) {
      echo "<li><p>" . $value['url'] . "</p>" . <a href="../controler/bask_office.ctrl.php?cat=1&url=" . $value['url'] . "><img class="refresh" src="../view/refresh.png"></a> . "</li>";
    }
    ?>
  </ul>
</body>
</html>
