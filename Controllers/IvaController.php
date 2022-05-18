<?php
require_once('Controllers/MainController.php');
require_once('Controllers/LoginController.php');

class IvaController extends MainController
{
    public function index(){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario', 'admin');

        $ivas = Ivas::all();
        $this->renderView('Views/Funcionario/IVA/index.php', ['ivas' => $ivas]);
    }
    public function show($id){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario', 'admin');

        $ivas = Ivas::find([$id]);
        if(is_null($ivas))
        {
            echo 'Iva não existe';
        } else {
            $this->renderView('Views/Funcionario/IVA/show.php', ['iva' => $ivas]);
        }
    }
    public function create(){
        // redireciona para vista para criar um novo
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario', 'admin');
        $this->renderView('Views/Funcionario/IVA/create.php');
    }
    public function store(){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario', 'admin');
        $iva = new Ivas($_POST);
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('iva', 'index');
        } else {
            $this->renderView('Views/Funcionario/IVA/create.php');
        }
    
    }
    public function edit($id){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario', 'admin');
        $iva = Ivas::find([$id]);

        if($iva->is_valid()){
            $this->renderView('Views/IVA/edit.php', ['iva' => $iva]);
        } else {
            $this->renderView('Views/IVA/index.php');
        }
    }
    public function update($id){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario', 'admin');
        $iva = Ivas::find([$id]);
        $iva->update_attributes($_POST);
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('iva','index');
        } else {
            $this->renderView('Views/IVA/edit.php');
        }
    }
    public function delete($id){
        $loginController = new LoginController();
        $loginController->loginFilter('funcionario', 'admin');
        $iva = Ivas::find([$id]);
        $iva->delete();
        $this->redirectToRoute('iva','index');
    }
}