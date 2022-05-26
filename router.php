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
require_once 'Controllers/ClienteController.php';
require_once 'Controllers/ErrorController.php';
require_once 'Controllers/ProdutoController.php';
require_once 'Controllers/FaturaController.php';
require_once 'Controllers/FuncionarioController.php';
require_once 'startup/boot.php';

$loginController = new LoginController();
$homeController = new HomeController();
$dashboardController = new DashboardController();
$ivaController = new IvaController();
$clienteController = new ClienteController();
$produtoController = new ProdutoController();
$faturaController = new FaturaController();
$funcionarioController = new FuncionarioController();
$errorController = new ErrorController();

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
        $loginController->loginFilter([$a]);
        $dashboardController->loggedInView($a);
        break;
    case 'error':
        switch($a){
            case 'noAccess':
                $errorController->noAccess();
                break;
        }
        break;
    case 'iva':
        $loginController->loginFilter(['funcionario', 'admin']);
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
        $loginController->loginFilter(['funcionario', 'admin']);
        switch($a){
            case 'show':
                $clienteController->show($id);
                break;
            case 'index':
                $clienteController->index();
                break;
            case 'create':
                $clienteController->create();
                break;
            case 'store':
                $clienteController->store();
                break;
            case 'edit':
                $clienteController->edit($id);
                break;
            case 'update':
                $clienteController->update($id);
                break;
            case 'delete':
                $clienteController->delete($id);
                break;
        }
        break;
    case 'produto':
        $loginController->loginFilter(['funcionario', 'admin']);
        switch($a){
            case 'index':
                $produtoController->index();
                break;
            case 'show':
                $produtoController->show($id);
                break;
            case 'create':
                $produtoController->create();
                break;
            case 'store':
                $produtoController->store();
                break;
            case 'edit':
                $produtoController->edit($id);
                break;
            case 'update':
                $produtoController->update($id);
                break;
            case 'delete':
                $produtoController->delete($id);
                break;
        }
        break;
    case 'fatura':
        switch($a){
            case 'index':
                $loginController->loginFilter(['cliente', 'funcionario', 'admin']);
                $faturaController->index();
                break;
            case 'escolher':
                $loginController->loginFilter(['funcionario', 'admin']);
                $faturaController->escolherCliente();
                break;
            case 'create':
                $loginController->loginFilter(['funcionario', 'admin']);
                $faturaController->create();
                break;
            case 'register':
                $loginController->loginFilter(['funcionario', 'admin']);
                $faturaController->register($id);
                break;
            case 'adicionarLinha':
                $loginController->loginFilter(['funcionario', 'admin']);
                $faturaController->adicionarLinha();
                break;
            case 'emitir':
                $loginController->loginFilter(['funcionario', 'admin']);
                $faturaController->emitir($id);
                break;
            case 'show':
                $loginController->loginFilter(['cliente', 'funcionario', 'admin']);
                $faturaController->show($id);
                break;
        }
        break;
    case 'funcionario':
        switch($a){
            case 'index':
                $loginController->loginFilter(['admin']);
                $funcionarioController->index();
                break;
            case 'show':
                $loginController->loginFilter(['admin']);
                $funcionarioController->show($id);
                break;
            case 'create':
                $loginController->loginFilter(['admin']);
                $funcionarioController->create();
                break;
            case 'store':
                $loginController->loginFilter(['admin']);
                $funcionarioController->store();
                break;
            case 'edit':
                $loginController->loginFilter(['admin']);
                $funcionarioController->edit($id);
                break;
            case 'atualizarPass':
                $loginController->loginFilter(['funcionario']);
                $funcionarioController->atualizarPass($id);
                break;
            case 'update':
                $loginController->loginFilter(['funcionario', 'admin']);
                $funcionarioController->update($id);
                break;
            case 'delete':
                $loginController->loginFilter(['admin']);
                $funcionarioController->delete($id);
                break;
        }
        break;
    default: $homeController->Index();
}