<?php
  require_once('../model/DAO.class.php');

  // gestion de la page pour laquel l'utilisateur se trouve
  if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
  } else {
    $cat = 0; // page par defaut du back_office
  }

  switch ($cat) {
    case 1: // page d'affichage des flux avec date de dernière mise à jour

      break;
    case 2: // page d'ajout de flux dans la base

      break;
    case 3: // page de mise à jour de flux

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
