<?php
//
// Router.php serve para redirecionar para o controlador correto
//


$c = ' ';
$a = ' ';
$id = ' ';

if(isset($_GET['c'])){
    $c = $_GET['c'];
}
if(isset($_GET['a'])){
    $a = $_GET['a'];
}

if(isset($_GET['id'])){ 
    $id = $_GET['id']; 
}

require_once 'Controllers/LoginController.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/DashboardController.php';
require_once 'Controllers/IvaController.php';
require_once 'Controllers/FuncionarioController.php';
require_once 'startup/boot.php';

$loginController = new LoginController();
$homeController = new HomeController();
$dashboardController = new DashboardController();
$ivaController = new IvaController();
$funcionarioController = new FuncionarioController();

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
    case 'iva':
        switch($a){
            case 'index':
                $ivaController->index();
                break;
            case 'show':
                $ivaController->show($id);
                break;
            case 'create':
                $ivaController->create();
                break;
            case 'store':
                $ivaController->store();
                break;
            case 'edit':
                $ivaController->edit($id);
                break;
            case 'update':
                $ivaController->update($id);
                break;
            case 'delete':
                $ivaController->delete($id);
                break;
        }
        break;
    case 'cliente':
        switch($a){
            case 'index':
                $funcionarioController->index();
                break;
            case 'create':
                $funcionarioController->create();
                break;
            case 'store':
                $funcionarioController->store();
                break;
        }
        break;
    default: $homeController->Index();
}