<?php
//
// Router.php serve para redirecionar para o controlador correto
//


$r = ' ';


if(isset($_GET['r'])){
    $r = $_GET['r'];
}

require_once 'Controllers/LoginController.php';
require_once 'Controllers/HomeController.php';

$loginController = new LoginController();
$homeController = new HomeController();

switch($r){
    case 'auth/login':
        $loginController->Login();
        break;
    case 'auth/logout':
        $loginController->Logout();
        break;
    case 'home/index':
        $homeController->Index();
    default:
        $loginController->Login();
}