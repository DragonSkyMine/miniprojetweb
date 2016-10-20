<?php
  require_once('../model/DAO.class.php');
  $data = $dao->getFlux();
  include('../view/afficher_flux.view.php');
?>
