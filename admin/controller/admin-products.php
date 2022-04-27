<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../view/ViewProduct.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelProduct.php';
ViewTemplate::head('Produits');
ViewTemplate::header();

$produits = new ModelProduct();
$produit = $produits->products();
$groupedeLignes = '';
for ($i = 0; $i < count($produit); $i++) {
    $id = $produit[$i]['id'];
    $photo = $produit[$i]['photo'];
    $nom = $produit[$i]['nom'];
    $ref = $produit[$i]['ref'];
    $quantite = $produit[$i]['quantite'];
    $prix = $produit[$i]['prix'];
    $ligne = '
                    <tr>
                        <td>' . $id . '</td>
                        <td><img src="uploads/brands/' . $photo . '" width="100px" alt="logo"></td>
                        <td class="h5 align-middle font-weight-bold">' . $nom . '</td>
                        <td class="h5 align-middle font-weight-bold">' . $ref . '</td>
                        <td class="h5 align-middle font-weight-bold">' . $quantite . '</td>
                        <td class="h5 align-middle font-weight-bold">' . $prix . '€</td>
                        <td class="align-middle text-right">
                            <a class="btn btn-warning" href="product-page.php?id=' . $id . '">+ d\'infos</a>
                            <a class="btn btn-info" href="product-update.php?id=' . $id . '">Modifier</a>
                            <a class="btn btn-danger" href="product-delete.php?id=' . $id . '">Supprimer</a>
                        </td>
                    </tr>
            ';
    $groupedeLignes .= $ligne;
}

if ($produit) {
    ViewTemplate::managers('ViewProduct', 'productManager', $groupedeLignes);
}ViewTemplate::managers('ViewTemplate', 'alert', ['warning', 'Aucun produit existant, ajoutez-en avant de pouvoir les afficher.', 'product-add.php']);
    

ViewTemplate::footer();
ViewTemplate::end(false);