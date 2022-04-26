<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewBrand.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelBrand.php';
require_once '../model/Utils.php';
ViewTemplate::head('Ajout de marque');
ViewTemplate::header();

if (isset($_POST['ajout'])) {
    $extensions = ["jpg", "jpeg", "png"];
    $upload = Utils::upload($extensions, $_FILES['logo'], 'uploads/brands/');
    if ($upload['uploadOk']) {
        $marque = new ModelBrand();
        if ($marque->add($_POST['nom'], $upload['file_name'])) {
            header('Location: admin-brands.php');
            ViewTemplate::alert('success', 'Marque ajoutée avec succès.', 'admin-brands.php');
        } else {
            ViewTemplate::alert('danger', $upload['errors']);
        }
    }
}
ViewTemplate::managers('ViewBrand', 'brandAdd', null);

ViewTemplate::footer();
ViewTemplate::end(false);
