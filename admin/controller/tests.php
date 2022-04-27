<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../view/ViewCategories.php';
require_once '../view/ViewDeliverer.php';
require_once '../view/ViewBrand.php';
require_once '../view/ViewProduct.php';

require_once '../view/ViewTests.php';

require_once '../model/ModelAdmin.php';
require_once '../model/ModelCategories.php';
require_once '../model/ModelDeliverer.php';
require_once '../model/ModelBrand.php';
require_once '../model/ModelProduct.php';
require_once '../model/Utils.php';

ViewTemplate::head('Tests');
ViewTemplate::header();

$categories = new ModelCategories();
$categorie = $categories->categories();
$id_categorie = '';
for ($i = 0; $i < count($categorie); $i++) {
    $ligne = '
                    <option value="'. $categorie[$i]['id'] .'">'. $categorie[$i]['nom'] .'</option>
            ';
    $id_categorie .= $ligne;
}

$marques = new ModelBrand();
$marque = $marques->brand();
$id_marque = '';
for ($i = 0; $i < count($marque); $i++) {
    $ligne = '
                    <option value="'. $marque[$i]['id'] .'">'. $marque[$i]['nom'] .'</option>
            ';
    $id_marque .= $ligne;
}

ViewTemplate::managers('ViewTests', 'formulaire', [$id_categorie, $id_marque]);

ViewTemplate::footer();
ViewTemplate::end(false);
