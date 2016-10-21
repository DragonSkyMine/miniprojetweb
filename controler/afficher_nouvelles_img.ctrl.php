<?php
require_once('../model/DAO.class.php');
if (isset($_GET['url'])) {
  $rss = $dao->readRSSfromURL($_GET['url']);
  if ($rss != NULL) {
    $rss->update();
    require_once('../view/afficher_nouvelles_img.view.php');
  }
}
?>
