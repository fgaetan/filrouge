<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewDeliverer.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelDeliverer.php';
require_once '../model/Utils.php';
ViewTemplate::head('Ajout de transporteur');
ViewTemplate::header();

if(isset($_POST['ajout'])) {
    $extensions = ["jpg", "jpeg", "png"];
    $upload = Utils::upload($extensions, $_FILES['logo']);
    if($upload['uploadOk']) {
        var_dump($_FILES['logo']);
        $transporteur = new ModelDeliverer();
        if ($transporteur->add($_POST['nom'], $_FILES['logo']['name'])) {
            header('Location: admin-deliverers.php');
            ViewTemplate::alert('success', 'Transporteur ajouté avec succès.', 'admin-deliverers.php');
        } else { ViewTemplate::alert('danger', $upload['errors']); }
    }
}   ViewTemplate::managers('ViewDeliverer', 'delivererAdd', null);

ViewTemplate::footer();
ViewTemplate::end(false);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
