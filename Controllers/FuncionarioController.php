<?php
require_once('Controllers/MainController.php');
require_once('Controllers/LoginController.php');
require_once('Models/LoginModel.php');

class FuncionarioController extends MainController
{
    public function index(){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario');

        $onlyClientes = array('conditions' => array('role = ?', 'cliente'));
        $clientes = Users::all($onlyClientes); 
        $this->renderView('Views/Funcionario/RegistoClientes/index.php', ['clientes' => $clientes]);
    }
    public function create(){
        // redireciona para vista para criar um novo
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario');
        $this->renderView('Views/Funcionario/RegistoClientes/create.php');
    }
    public function store(){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario');
        $cliente = new Users($_POST);
        if($cliente->is_valid()){
            $cliente->save();
            $this->redirectToRoute('cliente', 'index');
        } else {
            $this->renderView('Views/Funcionario/RegistoClientes/create.php');
        }
    }
}