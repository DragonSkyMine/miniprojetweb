<?php
require_once('../model/DAO.class.php');
if (isset($_GET['id'])) {
  $res = $dao->readNouvellefromRssId($_GET['id']);
}
require_once('../view/afficher_nouvelles.view.php');
?>
