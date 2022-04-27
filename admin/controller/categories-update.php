<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewCategories.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Modification de catégorie');
ViewTemplate::header();

$categorie = new ModelCategories();
if (isset($_GET['id'])) {
    if ($categorie->display($_GET['id'])) {
        ViewTemplate::managers('ViewCategories', 'categoriesUpdate', $_GET['id']);
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
} else {
    if (isset($_POST['id']) && $categorie->display($_POST['id'])) {
        if ($categorie->update(
            $_POST['id'],
            $_POST['nom']
        )) {
            ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
        }
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
}

ViewTemplate::footer();
ViewTemplate::end(false);
