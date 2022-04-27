<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewCategories.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Ajout de catégorie');
ViewTemplate::header();

if (isset($_POST['ajout'])) {
    $categorie = new ModelCategories();
    if ($categorie->add($_POST['nom'])) {
        ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
    }
    ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
}
ViewTemplate::managers('ViewCategories', 'categoriesAdd', null);

ViewTemplate::footer();
ViewTemplate::end(false);
