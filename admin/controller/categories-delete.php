<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewCategories.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Suppression de catégorie');
ViewTemplate::header();

if (isset($_GET['id'])) {
    $categorie = new ModelCategories();
    if ($categorie->display($_GET['id'])) {
        if ($categorie->delete($_GET['id'])) {
            session_destroy();
            ViewTemplate::alert("success", "Catégorie supprimée avec succès", "admin-categories.php");
        } else {
            ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-categories.php");
        }
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-categories.php");
    }
} else {
    ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-categories.php");
}

ViewTemplate::footer();
ViewTemplate::end(false);
