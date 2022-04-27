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
            ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', $upload['errors'], $_SERVER['HTTP_REFERER']]);
        }
    }
    ViewTemplate::managers('ViewTemplate', 'alert', ['danger', $upload['errors'], $_SERVER['HTTP_REFERER']]);
}
ViewTemplate::managers('ViewBrand', 'brandAdd', null);

ViewTemplate::footer();
ViewTemplate::end(false);
