<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../view/ViewDeliverer.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelDeliverer.php';
ViewTemplate::head('Transporteurs');
ViewTemplate::header();

$transporteurs = new ModelDeliverer();
$transporteur = $transporteurs->deliverer(); //retourne la table avec toutes les catégories, sous forme de tableau
$groupedeLignes = '';
for ($i = 0; $i < count($transporteur); $i++) {
    $id = $transporteur[$i]['id'];
    $nom = $transporteur[$i]['nom'];
    $logo = $transporteur[$i]['logo'];
    $ligne = '
                    <tr>
                        <td>' . $id . '</td>
                        <td>' . $nom . '</td>
                        <td>' . $logo . '</td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="deliverers-page.php?id='. $id .'">+ d\'infos</a>
                            <a class="btn btn-info" href="deliverers-update.php?id='. $id .'">Modifier</a>
                            <a class="btn btn-danger" href="deliverers-delete.php?id='. $id .'">Supprimer</a>
                        </td>
                    </tr>
            ';
    $groupedeLignes .= $ligne;
}
if ($transporteurs) {
    ViewTemplate::managers('ViewDeliverer', 'delivererManager', $groupedeLignes);
} else { //sinon une erreur
    ViewTemplate::alert("danger", "Nous ne pouvons pas afficher votre liste actuellement.", "admin-deliverers.php");
}

ViewTemplate::footer();
ViewTemplate::end(false);
