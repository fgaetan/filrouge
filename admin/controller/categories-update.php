<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Modification de catégorie');
ViewTemplate::header();

$categorie = new ModelCategories();

if (isset($_GET['id'])) {
    if ($categorie->display($_GET['id'])) {
        ViewTemplate::managers('ViewAdmin', 'categoriesUpdate', $_GET['id']);
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "index.php");
    }
} else {
    if (isset($_POST['id']) && $categorie->display($_POST['id'])) {
        if ($categorie->update(
            $_POST['id'],
            $_POST['nom']
        )) {
            ViewTemplate::alert("success", "Les modifications ont été effectuées, retour à votre page de profil.", "admin-categories.php");
        } else {
            ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-categories.php");
        }
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-categories.php");
    }
}

ViewTemplate::footer();
ViewTemplate::end(false);
