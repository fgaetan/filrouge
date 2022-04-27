<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewProduct.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelProduct.php';
ViewTemplate::head("Suppression d'un produit");
ViewTemplate::header();

if (isset($_GET['id'])) {
    $produit = new ModelProduct();
    if ($produit->display($_GET['id'])) {
        if (unlink('uploads\/products\/' . $produit->display($_GET['id'])['photo'])) {
            if ($produit->delete($_GET['id'])) {
                ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
            } else {
                ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
            }
        }
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
} else {
    ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
}

ViewTemplate::footer();
ViewTemplate::end(false);
