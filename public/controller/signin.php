<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
require_once '../model/Utils.php';
ViewTemplate::head('Inscription');
ViewTemplate::header();

if (isset($_POST['signin'])) {
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $user = new ModelUser();
    if ($user->signin(
        strtoupper($_POST['nom']),
        strtoupper($_POST['prenom']),
        strtolower($_POST['mail']),
        $pass,
        strtoupper($_POST['adresse']),
        strtoupper($_POST['ville']),
        $_POST['code_post'],
        $_POST['tel'],
        uniqid()
    )) {
        header('Location: signup.php');
    }
    ViewTemplate::alert('danger', 'Nous sommes désolé, mais nous avons rencontré une erreur. Veuillez réessayer.');
}
ViewUser::userSignin();

ViewTemplate::footer();
ViewTemplate::end(true);
