<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewBrand.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelBrand.php';
ViewTemplate::head('Fiche de marque');
ViewTemplate::header();

if (isset($_GET['id'])) {
    ViewTemplate::managers('ViewBrand', 'brandPage', $_GET['id']);
} else {
    header('Location : admin-brands.php');
}

ViewTemplate::footer();
ViewTemplate::end(false);
