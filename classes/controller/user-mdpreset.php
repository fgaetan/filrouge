<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
ViewTemplate::head('Récupération du mot de passe');
ViewTemplate::header();

ViewTemplate::footer();
ViewTemplate::end();