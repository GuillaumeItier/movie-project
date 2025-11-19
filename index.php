<?php
//import de de l'autoload
include 'vendor/autoload.php';
include 'env.php';

//Demarrage de session
session_start();

//récupération de l'url
$url = parse_url($_SERVER["REQUEST_URI"]);
$path = isset($url["path"]) ? $url["path"] : "/";

//Import des classes
use App\Controller\HomeController;
use App\Controller\ErrorController;
use App\Controller\CategoryController;
use App\Controller\RegisterController;

//Instance des controllers
$homeController = new HomeController();
$errorController = new ErrorController();
$categoryController = new CategoryController();
$registerController = new RegisterController();

//router deconnecté
switch ($path) {
    case '/':
        $homeController->index();
        break;
    case '/category/add':
        $categoryController->addCategory();
        break;
    case '/categories':
        $categoryController->showAllCategories();
        break;
    case '/login':
        $registerController->login();
        break;
    case '/logout':
        $registerController->logout();
        break;
    case '/register':
        $registerController->addAccount();
        break;
    default:
        $errorController->error404();
        break;
}

//router connecté user

//router connecté admin