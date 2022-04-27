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
            ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
        }
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
} else {
    ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
}

ViewTemplate::footer();
ViewTemplate::end(false);
