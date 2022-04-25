<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAdmin.php';
require_once '../model/ModelAdmin.php';
ViewTemplate::head('Dashboard administrateur');
ViewTemplate::header();

ViewTemplate::managers(null, null, null);

ViewTemplate::footer();
ViewTemplate::end(false);