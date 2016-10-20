<?php
require_once('../model/DAO.class.php');
if (isset($_GET['id'])) {
  $res = $dao->readNouvellefromRssId($_GET['id']);
  include('../view/afficher_nouvelles.view.php');
}
?>
