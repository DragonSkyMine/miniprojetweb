<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <ul>
    <?php
    foreach ($flux as $key => $value) {
      echo "<li>" . $value['url'] . "</li>";
    }
    ?>
  </ul>
</body>
</html>
