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
        if ($transporteur->delete($_GET['id'])) {
            session_destroy();
            ViewTemplate::alert("success", "Transporteur supprimé avec succès", "admin-deliverers.php");
        } else {
            ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-deliverers.php");
        }
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-deliverers.php");
    }
} else {
    ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-deliverers.php");
}

ViewTemplate::footer();
ViewTemplate::end(false);
