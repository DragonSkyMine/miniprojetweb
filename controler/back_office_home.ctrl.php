<?php
  require_once('../model/DAO.class.php');

  // gestion de la page pour laquel l'utilisateur se trouve
  if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
  } else {
    $cat = 0; // page par defaut du back_office
  }

  switch ($cat) {
    case 0: // page par défaut
      require_once('../view/back_office_home.view.php');
      break;
    case 1: // page d'affichage des flux avec date de dernière mise à jour
      header("location:back_office.ctrl.php");;
      break;
    case 2: // page d'ajout de flux dans la base
      header("location:back_office.ctrl.php");
      break;
    case 3: // page de mise à jour de flux
      header("location:back_office.ctrl.php");
      break;
    case 4: // page de vidage des flux
      header("location:back_office.ctrl.php");
      break;
    case 5: // page de suppression d'un flux
      header("location:back_office.ctrl.php");
      break;
    default:
      header("location:back_office.ctrl.php");
      break;
  }
?>
