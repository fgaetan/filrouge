<?php
session_start();
require_once '../view/ViewUserTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
require_once '../model/Utils.php';
ViewTemplate::head('Mot de passe oublié');
ViewTemplate::header();

if (isset($_POST['forget'])) {
    $user = new ModelUser();
    $clients = $user->users();
    if (isset($_POST['mail'])) {
        $user->signup($_POST['mail']);
        $user->createToken($_POST['id'], $_POST['mail'], $_POST['token'] = uniqid());
        $lien = 'http://localhost/filrouge/classes/controller/recuperation.php' . $_POST['id'] . $_POST['token'];
        mail($_POST['mail'], 'Votre nouveau mot de passe!', $lien);
        if (mail($_POST['mail'], 'Votre nouveau mot de passe!', $lien)) {
            ViewTemplate::alert('success', "Un mail vous a été envoyé à l'adresse suivante: {$_POST['mail']}");
        }
        ViewTemplate::alert('danger', "Echec de l'envoi du mail.", 'user-forget.php');
    }
    ViewTemplate::alert('danger', "Cette adresse mail n'existe pas. Veuillez réessayer.", 'user-forget.php');
}
ViewUser::userForget();

ViewTemplate::footer();
ViewTemplate::end(true);