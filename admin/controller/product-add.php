<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewProduct.php';
require_once '../model/ModelAdmin.php';
require_once '../model/ModelProduct.php';
require_once '../model/ModelCategories.php';
require_once '../model/ModelBrand.php';
require_once '../model/Utils.php';
ViewTemplate::head('Ajout de produit');
ViewTemplate::header();

$categories = new ModelCategories();
$categorie = $categories->categories();
$id_categorie = '';
for ($i = 0; $i < count($categorie); $i++) {
    $ligne = '
                    <option value="' . $categorie[$i]['id'] . '">' . $categorie[$i]['nom'] . '</option>
            ';
    $id_categorie .= $ligne;
}

$marques = new ModelBrand();
$marque = $marques->brand();
$id_marque = '';
for ($i = 0; $i < count($marque); $i++) {
    $ligne = '
                    <option value="' . $marque[$i]['id'] . '">' . $marque[$i]['nom'] . '</option>
            ';
    $id_marque .= $ligne;
}

if (isset($_POST['ajout'])) {
    $extensions = ["jpg", "jpeg", "png"];
    $upload = Utils::upload($extensions, $_FILES['photo'], 'uploads/products/');
    if ($upload['uploadOk']) {
        $produit = new ModelProduct();
        if ($produit->add($_POST['nom'], $_POST['ref'], $_POST['description'], $_POST['quantite'], $_POST['prix'], $upload['file_name'], $_POST['id_categorie'], $_POST['id_marque'])) {
            ViewTemplate::managers('ViewTemplate', 'alert', ['success', 'Action effectuée avec succès.', $_SERVER['HTTP_REFERER']]);
        } else {
            ViewTemplate::managers('ViewTemplate', 'alert', ['danger', $upload['errors'], 'admin-index.php']);
        }
    }
    ViewTemplate::managers('ViewTemplate', 'alert', ['danger', $upload['errors'], $_SERVER['HTTP_REFERER']]);
}
ViewTemplate::managers('ViewProduct', 'productAdd', [$id_categorie, $id_marque]);

ViewTemplate::footer();
ViewTemplate::end(false);
