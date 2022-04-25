<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../view/ViewCategories.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
ViewTemplate::head('Catégories');
ViewTemplate::header();

$categorie = new ModelCategories();
$categories = $categorie->categories(); //retourne la table avec toutes les catégories, sous forme de tableau
$groupedeLignes = '';
for ($i = 0; $i < count($categories); $i++) {
    $id = $categories[$i]['id'];
    $nom = $categories[$i]['nom'];
    $ligne = '
                    <tr>
                        <td>' . $id . '</td>
                        <td>' . $nom . '</td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="categories-page.php?id='. $id .'">+ d\'infos</a>
                            <a class="btn btn-info" href="categories-update.php?id='. $id .'">Modifier</a>
                            <a class="btn btn-danger" href="categories-delete.php?id='. $id .'">Supprimer</a>
                        </td>
                    </tr>
            ';
    $groupedeLignes .= $ligne;
}
if ($categories) {
    ViewTemplate::managers('ViewCategories', 'categoriesManager', $groupedeLignes);
} else { //sinon une erreur
    ViewTemplate::alert("danger", "Nous ne pouvons pas afficher votre liste actuellement.", "admin-categories.php");
}

ViewTemplate::footer();
ViewTemplate::end(false);
