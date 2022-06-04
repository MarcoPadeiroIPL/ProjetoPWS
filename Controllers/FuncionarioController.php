<?php
require_once('Controllers/MainController.php');
require_once('Models/LoginModel.php');

class FuncionarioController extends MainController
{
    public function show($id){
        $funcionario = User::find([$id]);
        $this->renderView('Views/RegistoFuncionarios/show.php', ['funcionario' => $funcionario]);
    }
    public function index(){
        $funcionarios = User::all(array('conditions' => array('role = ?','funcionario')));
        $this->renderView('Views/RegistoFuncionarios/index.php', ['funcionarios' => $funcionarios]);
    }
    public function create(){
        // redireciona para vista para criar um novo
        $this->renderView('Views/RegistoFuncionarios/create.php');
    }
    public function store(){
        $funcionario = new User($_POST);
        // encriptar a password
        $funcionario->password = password_hash($funcionario->password, PASSWORD_DEFAULT);
        if($funcionario->is_valid()){
            $funcionario->save();
            $this->redirectToRoute(['c'=>'funcionario', 'a'=>'index']);
        } else {
            $this->renderView('Views/RegistoFuncionarios/create.php');
        }
    }
    public function edit($id){
        $funcionario = User::find([$id]);

        if($funcionario->is_valid()){
            $this->renderView('Views/RegistoFuncionarios/edit.php', ['funcionario' => $funcionario]);
        } else {
            $this->renderView('Views/RegistoFuncionarios/index.php');
        }
    }
    public function atualizarPass(){
        $loginModel = new LoginModel();
        $funcionario = User::find(array('conditions' => array('username = ?', $loginModel->findUsername())));
        if($funcionario->is_valid()){
            $this->renderView('Views/RegistoFuncionarios/updateEmail.php', ['funcionario' => $funcionario]);
        } else {
            $this->renderView('Views/RegistoFuncionarios/index.php');
        }
    }
    public function update($id){
        $loginModel = new LoginModel();

        $funcionario = User::find([$id]);
        $_POST['password'] = empty($_POST['password']) ? $funcionario->password : password_hash($_POST['password'], PASSWORD_DEFAULT);
        $funcionario->update_attributes($_POST);
        if($funcionario->is_valid()){
            $funcionario->save();
            if($loginModel->findRole == 'admin'){ $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']); }
            else { $this->redirectToRoute(['c' => 'home']); }
        } else {
            $this->renderView('Views/RegistoFuncionarios/edit.php');
        }
    }
    public function delete($id){
        $funcionario = User::find([$id]);
        foreach($funcionario->faturas as $fatura){
            foreach($fatura->linhas as $linha){
                $linha->delete();
            }
            $fatura->delete();                
        }
        $funcionario->delete();
        $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
    }
}