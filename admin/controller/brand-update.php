<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewBrand.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelBrand.php';
require_once '../model/Utils.php';
ViewTemplate::head("Modification d'une marque");
ViewTemplate::header();

$marque = new ModelBrand();
if (isset($_GET['id'])) {
    if ($marque->display($_GET['id'])) {
        ViewTemplate::managers('ViewBrand', 'brandUpdate', $_GET['id']);
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
} else {
    if (isset($_POST['id']) && $marque->display($_POST['id'])) {
        $extensions = ["jpg", "jpeg", "png"];
        $upload = Utils::upload($extensions, $_FILES['logo'], 'uploads/brands/');
        if ($upload['uploadOk']) {
            if ($marque->update(
                $_POST['id'],
                $_POST['nom'],
                $upload['file_name']
            )) {
                ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
            }
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
        }
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
}

ViewTemplate::footer();
ViewTemplate::end(false);
