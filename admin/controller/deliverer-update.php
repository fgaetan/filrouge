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
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
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
                ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
            }
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', $upload['errors'], $_SERVER['HTTP_REFERER']]);
        }
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
}

ViewTemplate::footer();
ViewTemplate::end(false);
