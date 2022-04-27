<?php
session_start();
require_once '../view/ViewUserTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
require_once '../model/Utils.php';
ViewTemplate::head('Nouveau mot de passe');
ViewTemplate::header();

if (isset($_POST['recuperation'])) {
    $user = new ModelUser();
    $_GET['id'] = '';
    if ($_GET['id'] && $_GET['token']) {
        $id = $_GET['id'];
        $token = $_GET['token'];
        //vérifier si l'id ET le token existe tous deux dans la base de donnée
        $toVerify = $user->forgetPass($id, $token);
        if ($toVerify) {
            $user->newPass($_POST['pass'], null);
        }
        ViewTemplate::alert('danger', 'Nous sommes désolé, mais nous avons rencontré une erreur.', 'user-recuperation.php');
    }
    ViewTemplate::alert('danger', 'Nous sommes désolé, mais nous avons rencontré une erreur.', 'user-recuperation.php');
}
ViewUser::userRecuperation();

ViewTemplate::footer();
ViewTemplate::end(true);
