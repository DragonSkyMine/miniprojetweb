<?php
  require_once('../model/DAO.class.php');

  // gestion de la page pour laquel l'utilisateur se trouve
  if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
  } else {
    $cat = 0; // page par defaut du back_office
  }

  switch ($cat) {
    case 1: // page de mise à jour du flux en paramètre
      if(isset($_GET['url'])) {
        $dao->updateRSS($dao->readRSSfromURL($_GET['url']));
      }
      break;
    case 2: // suppression d'un flux
      if(isset($_GET['url'])) {
        $dao->deleteRSS($_GET['url']);
      }
      break;
    case 3: // ajouter un flux
      if(isset($_GET['url'])) {
        $dao->createRSS($_GET['url']);
      }
      break;
    case 4: // page de vidage des flux

      break;
    case 5: // page de suppression d'un flux

      break;
    default:

      break;
  }
  $flux = $dao->getFlux();
  require_once('../view/back_office.view.php');
?>
