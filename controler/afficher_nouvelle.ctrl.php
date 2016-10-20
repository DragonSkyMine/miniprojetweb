<?php
require_once('../model/DAO.class.php');
if (isset($_GET['id'])) {
  $res = $dao->readNouvellefromId($_GET['id']);
}
require_once('../view/afficher_nouvelles.view.php');
?>
