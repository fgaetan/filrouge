<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
require_once '../model/ModelAdmin.php';
require_once '../model/Utils.php';
ViewTemplate::head('Connexion');
ViewTemplate::header();

if (isset($_POST['signup'])) {
  $user = new ModelUser();
  $admin = new ModelAdmin();
  $userData = $user->signup($_POST['mail']);
  $adminData = $admin->signupAdmin($_POST['mail']);
  if ($userData && password_verify($_POST['pass'], $userData['pass'])) {
    $_SESSION['id'] = $userData['id'];
    $_SESSION['nom'] = $userData['nom'];
    $_SESSION['prenom'] = $userData['prenom'];
    $_SESSION['mail'] = $userData['mail'];
    $_SESSION['adresse'] = $userData['adresse'];
    $_SESSION['ville'] = $userData['ville'];
    $_SESSION['code_post'] = $userData['code_post'];
    $_SESSION['tel'] = $userData['tel'];
    header('Location: user-profile.php');
  } elseif ($adminData && password_verify($_POST['pass'], $adminData['pass'])){
    $_SESSION['id'] = $adminData['id'];
    $_SESSION['nom'] = $adminData['nom'];
    $_SESSION['prenom'] = $adminData['prenom'];
    $_SESSION['mail'] = $adminData['mail'];
    $_SESSION['role'] = $adminData['role'];
    header('Location: ../../admin/controller/admin-index.php');
  }
  ViewTemplate::alert('danger', "Désolé, mais nous n'arrivons pas à vous connecter. Veuillez réessayer.");
}

ViewUser::userSignup();

ViewTemplate::footer();
ViewTemplate::end(false);
