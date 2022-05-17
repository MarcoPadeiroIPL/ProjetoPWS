<?php
//
// Router.php serve para redirecionar para o controlador correto
//


$c = ' ';
$a = ' ';

if(isset($_GET['c'])){
    $c = $_GET['c'];
}
if(isset($_GET['a'])){
    $a = $_GET['a'];
}

require_once 'Controllers/LoginController.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/DashboardController.php';
require_once 'startup/boot.php';

$loginController = new LoginController();
$homeController = new HomeController();
$dashboardController = new DashboardController();

switch($c){
    case 'home':
        $homeController->index();
        break;
    case 'auth':
        switch($a){
            case 'login':
                $loginController->login();
                break;
            case 'logout':
                $loginController->logout();
                break;
            default: $loginController->login();
        }  
        break;
    case 'dashboard':
        $dashboardController->loggedInView($a);
        break;
    default: $homeController->Index();
    
    
}