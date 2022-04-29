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
require_once 'Controllers/DashboardController.php';

$loginController = new LoginController();
$homeController = new HomeController();
$dashboardController = new DashboardController();
switch($r){
    case 'auth/login':
        $loginController->Login();
        break;
    case 'auth/logout':
        $loginController->Logout();
        break;
    case 'home/index':
        $homeController->Index();
        break;
    case 'dashboard/admin':
        $dashboardController->LoggedInView('admin');
        break;
    case 'dashboard/cliente':
        $dashboardController->LoggedInView('cliente');
        break;
    case 'dashboard/funcionario':
        $dashboardController->LoggedInView('funcionario');
        break;
    default:
        $homeController->Index();
}