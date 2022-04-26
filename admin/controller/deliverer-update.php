<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewDeliverer.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelDeliverer.php';
require_once '../model/Utils.php';
ViewTemplate::head('Modification du transporteur');
ViewTemplate::header();

$transporteur = new ModelDeliverer();
if (isset($_GET['id'])) {
    if ($transporteur->display($_GET['id'])) {
        ViewTemplate::managers('ViewDeliverer', 'delivererUpdate', $_GET['id']);
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-deliverers.php");
    }
} else {
    if (isset($_POST['id']) && $transporteur->display($_POST['id'])) {
        $extensions = ["jpg", "jpeg", "png"];
        $upload = Utils::upload($extensions, $_FILES['logo'], 'uploads/deliverers/');
        if ($upload['uploadOk']) {
            if ($transporteur->update(
                $_POST['id'],
                $_POST['nom'],
                $upload['file_name']
            )) {
                ViewTemplate::alert("success", "Les modifications ont été effectuées, retour à la liste", "admin-deliverers.php");
            }
        } else {
            ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-deliverers.php");
        }
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-deliverers.php");
    }
}

ViewTemplate::footer();
ViewTemplate::end(false);
