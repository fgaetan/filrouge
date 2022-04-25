<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
ViewTemplate::head('Panier');
ViewTemplate::header();

ViewTemplate::footer();
ViewTemplate::end(false);