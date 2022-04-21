<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
ViewTemplate::head('Connexion');
ViewTemplate::header();

if (isset($_POST['signup'])) {
  $user = new ModelUser();
  $userData = $user->signup($_POST['mail']);
  if ($userData && password_verify($_POST['pass'], $userData['pass'])) {
    $_SESSION['id'] = $userData['id'];
    $_SESSION['nom'] = $userData['nom'];
    $_SESSION['prenom'] = $userData['prenom'];
    $_SESSION['mail'] = $userData['mail'];
    $_SESSION['adresse'] = $userData['adresse'];
    $_SESSION['ville'] = $userData['ville'];
    $_SESSION['code_post'] = $userData['code_post'];
    $_SESSION['tel'] = $userData['tel'];
    if (isset($_SESSION['role']['id']) === 1) {
      header('Location: ./admin/admin-index.php');
    }
    header('Location: user-profile.php');
  }
  ViewTemplate::alert('danger', "Désolé, mais nous n'arrivons pas à vous connecter. Veuillez réessayer.");
}

ViewUser::userSignup();

ViewTemplate::footer();
ViewTemplate::end();
