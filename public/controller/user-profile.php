<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
ViewTemplate::head('Ma Page');
ViewTemplate::header();

if (isset($_SESSION['id'])) {
    ViewUser::userProfile($_SESSION['id']);
} else {
    header('Location : signin.php');
}

ViewTemplate::footer();
ViewTemplate::end(false);
