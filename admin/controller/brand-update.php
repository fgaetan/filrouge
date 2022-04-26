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
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-brands.php");
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
                ViewTemplate::alert("success", "Les modifications ont été effectuées, retour à la liste", "admin-brands.php");
            }
        } else {
            ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-brands.php");
        }
    } else {
        ViewTemplate::alert("danger", "Nous sommes désolé, mais nous avons rencontré une erreur.", "admin-brands.php");
    }
}

ViewTemplate::footer();
ViewTemplate::end(false);
