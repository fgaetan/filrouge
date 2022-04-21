<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
ViewTemplate::head('Modification de profil');
ViewTemplate::header();

$user = new ModelUser();

if (isset($_GET['id'])) {
    if ($user->display($_GET['id'])) {
        ViewUser::userUpdate($_GET['id']);
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "index.php");
    }
} else {
    if (isset($_POST['id']) && $user->display($_POST['id'])) {
        if ($user->update(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['mail'],
            $_POST['adresse'],
            $_POST['ville'],
            $_POST['code_post'],
            $_POST['tel']
        )) {
            ViewTemplate::alert("success", "Les modifications ont été effectuées, retour à votre page de profil.", "user-profile.php");
        } else {
            ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "user-profile.php");
        }
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "user-profile.php");
    }
}

ViewTemplate::footer();
ViewTemplate::end();
