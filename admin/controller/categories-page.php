<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Catégories');
ViewTemplate::header();

if (isset($_GET['id'])) {
    ViewTemplate::managers('ViewAdmin', 'categoriesPage', $_GET['id']);
} else {
    header('Location : admin-categories.php');
}


ViewTemplate::footer();
ViewTemplate::end(false);
