<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewDeliverer.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelDeliverer.php';
ViewTemplate::head('Fiche transporteur');
ViewTemplate::header();

if (isset($_GET['id'])) {
    ViewTemplate::managers('ViewDeliverer', 'delivererPage', $_GET['id']);
} else {
    header('Location : admin-deliverer.php');
}


ViewTemplate::footer();
ViewTemplate::end(false);
