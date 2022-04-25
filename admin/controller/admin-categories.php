<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
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
                        <td class="text-right"><a class="btn btn-info" href="">Modifier</a>
                            <a class="btn btn-danger" href="">Supprimer</a>
                        </td>
                    </tr>
            ';
    $groupedeLignes .= $ligne;
}
if ($categories) {
    ViewTemplate::managers(true, 'categoriesManager', $groupedeLignes);
} else { //sinon une erreur
    ViewTemplate::managers(false, '', '');
}

ViewTemplate::footer();
ViewTemplate::end(false);
