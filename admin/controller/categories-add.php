<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewCategories.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Ajout de catégorie');
ViewTemplate::header();

if(isset($_POST['ajout'])) {
    $categorie = new ModelCategories();
    if ($categorie->add($_POST['nom'])) {
        header('Location: admin-categories.php');
        ViewTemplate::alert('success', 'Catégorie ajoutée avec succès.');
    }   ViewTemplate::alert('danger', "Echec de l'ajout de catégorie, veuillez réessayer.");
}   ViewTemplate::managers('ViewCategories', 'categoriesAdd', null);

ViewTemplate::footer();
ViewTemplate::end(false);