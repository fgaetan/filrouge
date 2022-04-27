<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewProduct.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelProduct.php';
ViewTemplate::head('Fiche produit');
ViewTemplate::header();

if (isset($_GET['id'])) {
    ViewTemplate::managers('ViewProduct', 'productPage', $_GET['id']);
} else {
    header('Location : admin-products.php');
}

ViewTemplate::footer();
ViewTemplate::end(false);
