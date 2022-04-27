<?php
session_start();
require_once '../view/ViewUserTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
ViewTemplate::head('Supprimer?');
ViewTemplate::header();

if (isset($_GET['id'])) {
  $user = new ModelUser();
  if ($user->display($_GET['id'])) {
    if ($user->delete($_GET['id'])) {
        session_destroy();
        ViewTemplate::alert("success", "Compte supprimé avec succès", "index.php");
    } else {
      ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "index.php");
    }
  } else {
    ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "user-profile.php");
  }
} else {
  ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "user-profile.php");
}

ViewTemplate::footer();
ViewTemplate::end(false);
