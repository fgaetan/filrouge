<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../view/ViewBrand.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelBrand.php';
ViewTemplate::head('Marques');
ViewTemplate::header();

$marques = new ModelBrand();
$marque = $marques->brand();
for ($i = 0; $i < count($marque); $i++) {
    $id = $marque[$i]['id'];
    $nom = $marque[$i]['nom'];
    $logo = $marque[$i]['logo'];
    $ligne = '
                    <tr>
                        <td>' . $id . '</td>
                        <td class="h5 align-middle font-weight-bold">' . $nom . '</td>
                        <td><img src="uploads/brands/' . $logo . '" width="100px" alt="logo"></td>
                        <td class="align-middle text-right">
                            <a class="btn btn-warning" href="brand-page.php?id=' . $id . '">+ d\'infos</a>
                            <a class="btn btn-info" href="brand-update.php?id=' . $id . '">Modifier</a>
                            <a class="btn btn-danger" href="brand-delete.php?id=' . $id . '">Supprimer</a>
                        </td>
                    </tr>
            ';
    $groupedeLignes .= $ligne;
}
if ($marque) {
    ViewTemplate::managers('ViewBrand', 'brandManager', $groupedeLignes);
} else {
    ViewTemplate::alert("danger", "Nous ne pouvons pas afficher votre liste actuellement.", "admin-index.php");
}

ViewTemplate::footer();
ViewTemplate::end(false);
