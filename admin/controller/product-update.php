<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewProduct.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelProduct.php';
require_once '../model/ModelCategories.php';
require_once '../model/ModelBrand.php';
require_once '../model/Utils.php';
ViewTemplate::head("Modification d'un produit");
ViewTemplate::header();

$categories = new ModelCategories();
$categorie = $categories->categories();
$id_categorie = '';
for ($i = 0; $i < count($categorie); $i++) {
    $ligne1 = '<option selected value="null">' . $categorie[0]['nom'] . '</option>';
    for ($i = 1; $i < count($categorie); $i++) {
        $ligneX = '
                    <option value="' . $categorie[$i]['id'] . '">' . $categorie[$i]['nom'] . '</option>
            ';
        $id_categorie .= $ligneX;
    }
    $id_categorie .= $ligne1;
}

$marques = new ModelBrand();
$marque = $marques->brand();
$id_marque = '';
for ($i = 0; $i < count($marque); $i++) {
    $ligne1 = '<option selected value="null">' . $marque[0]['nom'] . '</option>';
    for ($i = 1; $i < count($marque); $i++) {
        $ligneX = '
                    <option value="' . $marque[$i]['id'] . '">' . $marque[$i]['nom'] . '</option>
            ';
        $id_marque .= $ligneX;
    }
    $id_marque .= $ligne1;
}

$produit = new ModelProduct();
if (isset($_GET['id'])) {
    if ($produit->display($_GET['id'])) {
        ViewTemplate::managers('ViewProduct', 'productUpdate', [$_GET['id'], [$id_categorie, $id_marque]]);
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
} else {
    if (isset($_POST['id']) && $produit->display($_POST['id'])) {
        $extensions = ["jpg", "jpeg", "png"];
        $upload = Utils::upload($extensions, $_FILES['photo'], 'uploads/products/');
        if ($upload['uploadOk']) {
            if ($produit->update(
                $_POST['id'],
                $_POST['nom'],
                $_POST['ref'],
                $_POST['description'],
                $_POST['quantite'],
                $_POST['prix'],
                $upload['file_name'],
                $_POST['id_categorie'],
                $_POST['id_marque']
            )) {
                ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
            }
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
        }
    } else {
        ViewTemplate::managers('ViewTemplate', 'alert', ['danger', 'Erreur.', $_SERVER['HTTP_REFERER']]);
    }
}

ViewTemplate::footer();
ViewTemplate::end(false);
