<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../view/ViewCategories.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Catégories');
ViewTemplate::header();

$categories = new ModelCategories();
$categorie = $categories->categories();
$groupedeLignes = '';
for ($i = 0; $i < count($categorie); $i++) {
    $id = $categorie[$i]['id'];
    $nom = $categorie[$i]['nom'];
    $ligne = '
                    <tr>
                        <td>' . $id . '</td>
                        <td class="h5 align-middle font-weight-bold">' . $nom . '</td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="categories-page.php?id=' . $id . '">+ d\'infos</a>
                            <a class="btn btn-info" href="categories-update.php?id=' . $id . '">Modifier</a>
                            <a class="btn btn-danger" href="categories-delete.php?id=' . $id . '">Supprimer</a>
                        </td>
                    </tr>
            ';
    $groupedeLignes .= $ligne;
}
if ($categorie) {
    ViewTemplate::managers('ViewCategories', 'categoriesManager', $groupedeLignes);
} ViewTemplate::managers('ViewTemplate', 'alert', ['warning', 'Aucune catégorie existante, ajoutez-en avant de pouvoir les afficher.', 'categories-add.php']);


ViewTemplate::footer();
ViewTemplate::end(false);
