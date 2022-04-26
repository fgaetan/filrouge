<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewBrand.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelBrand.php';
ViewTemplate::head("Suppression d'une marque");
ViewTemplate::header();

if (isset($_GET['id'])) {
    $marque = new ModelBrand();
    if ($marque->display($_GET['id'])) {
        if (unlink('uploads\/brands\/'.$marque->display($_GET['id'])['logo'])) {
            if ($marque->delete($_GET['id'])) {
                ViewTemplate::alert("success", "Marque supprimée avec succès", "admin-brands.php");
            } else {
                ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-brands.php");
            }
        }
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-brands.php");
    }
} else {
    ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-brands.php");
}

ViewTemplate::footer();
ViewTemplate::end(false);