<?php
require_once('../model/DAO.class.php');
if (isset($_GET['id'])) {
  $res = $dao->readNouvellefromId($_GET['id']);
}
include('../view/afficher_nouvelle.view.php');
?>
