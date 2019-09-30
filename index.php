<?php


// Controller Call
require_once "Controllers/TemplateController.php";

// Models Call
require_once "Models/Connection.php";
require_once "Models/HomeModel.php";
require_once "Models/AdminModel.php";
require_once "Models/GalleryModel.php";
require_once "Models/AboutModel.php";
require_once "Models/FooterModel.php";
require_once "Models/BackgroundsModel.php";

// Controller Metod
$Template = new TemplateController();
// Initializaion
$Template->ViewTemplate();

?>