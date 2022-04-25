<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewDeliverer.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelDeliverer.php';
ViewTemplate::head('Ajout de transporteur');
ViewTemplate::header();

if(isset($_POST['ajout'])) {
    $transporteur = new ModelDeliverer();
    if ($transporteur->add($_POST['nom'], $_POST['logo'])) {
        header('Location: admin-deliverers.php');
        ViewTemplate::alert('success', 'Transporteur ajouté avec succès.');
    }   ViewTemplate::alert('danger', "Echec de l'ajout de transporteur, veuillez réessayer.");
}   ViewTemplate::managers('ViewDeliverer', 'delivererAdd', null);

ViewTemplate::footer();
ViewTemplate::end(false);