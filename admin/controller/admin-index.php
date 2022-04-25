<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../model/ModelAdmin.php';
ViewTemplate::head('Dashboard administrateur');
ViewTemplate::header();

$contenu = ViewAdmin::dashboard();

ViewTemplate::managers($contenu);

ViewTemplate::footer();
ViewTemplate::end(false);