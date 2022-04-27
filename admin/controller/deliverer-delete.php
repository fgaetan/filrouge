<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewDeliverer.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelDeliverer.php';
ViewTemplate::head('Suppression de transporteur');
ViewTemplate::header();

if (isset($_GET['id'])) {
    $transporteur = new ModelDeliverer();
    if ($transporteur->display($_GET['id'])) {
        if (unlink('uploads\/deliverers\/' . $transporteur->display($_GET['id'])['logo'])) {
            if ($transporteur->delete($_GET['id'])) {
                ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
            } else {
                ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
            }
        }
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
} else {
    ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
}

ViewTemplate::footer();
ViewTemplate::end(false);
