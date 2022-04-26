<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewCategories.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Fiche catégorie');
ViewTemplate::header();

if (isset($_GET['id'])) {
    ViewTemplate::managers('ViewCategories', 'categoriesPage', $_GET['id']);
} else {
    header('Location : admin-categories.php');
}


ViewTemplate::footer();
ViewTemplate::end(false);
