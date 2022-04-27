<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewDeliverer.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelDeliverer.php';
require_once '../model/Utils.php';
ViewTemplate::head('Ajout de transporteur');
ViewTemplate::header();

if (isset($_POST['ajout'])) {
    $extensions = ["jpg", "jpeg", "png"];
    $upload = Utils::upload($extensions, $_FILES['logo'], 'uploads/deliverers/');
    if ($upload['uploadOk']) {
        $transporteur = new ModelDeliverer();
        if ($transporteur->add($_POST['nom'], $upload['file_name'])) {
            ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', $upload['errors'], $_SERVER['HTTP_REFERER']]);
        }
    }
    ViewTemplate::managers('ViewTemplate', 'alert', ['danger', $upload['errors'], $_SERVER['HTTP_REFERER']]);
}
ViewTemplate::managers('ViewDeliverer', 'delivererAdd', null);

ViewTemplate::footer();
ViewTemplate::end(false);
