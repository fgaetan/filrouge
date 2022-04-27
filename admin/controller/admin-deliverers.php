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
$transporteur = $transporteurs->deliverer();
$groupedeLignes = '';
for ($i = 0; $i < count($transporteur); $i++) {
    $id = $transporteur[$i]['id'];
    $nom = $transporteur[$i]['nom'];
    $logo = $transporteur[$i]['logo'];
    $ligne = '
                    <tr>
                        <td>' . $id . '</td>
                        <td class="h5 align-middle font-weight-bold">' . $nom . '</td>
                        <td><img src="uploads/deliverers/' . $logo . '" width="100px" alt="logo"></td>
                        <td class="align-middle text-right">
                            <a class="btn btn-warning" href="deliverer-page.php?id=' . $id . '">+ d\'infos</a>
                            <a class="btn btn-info" href="deliverer-update.php?id=' . $id . '">Modifier</a>
                            <a class="btn btn-danger" href="deliverer-delete.php?id=' . $id . '">Supprimer</a>
                        </td>
                    </tr>
            ';
    $groupedeLignes .= $ligne;
}
if ($transporteur) {
    ViewTemplate::managers('ViewDeliverer', 'delivererManager', $groupedeLignes);
} ViewTemplate::managers('ViewTemplate', 'alert', ['warning', 'Aucun transporteur existant, ajoutez-en avant de pouvoir les afficher.', 'deliverer-add.php']);

    

ViewTemplate::footer();
ViewTemplate::end(false);
