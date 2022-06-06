<?php
require_once('Controllers/MainController.php');
require_once('Models/LoginModel.php');

class FuncionarioController extends MainController
{
    public function show($id)
    {
        $funcionario = User::find([$id]);
        $this->renderView('Funcionarios', 'show.php', ['funcionario' => $funcionario]);
    }
    public function index()
    {
        $funcionarios = User::all(array('conditions' => array('role = ?', 'funcionario')));
        $this->renderView('Funcionarios', 'index.php', ['funcionarios' => $funcionarios, 'pesquisa' => false]);
    }
    public function create()
    {
        // redireciona para vista para criar um novo
        $this->renderView('Funcionarios', 'create.php');
    }
    public function store()
    {
        $funcionario = new User($_POST);
        // encriptar a password
        $funcionario->password = password_hash($funcionario->password, PASSWORD_DEFAULT);
        if ($funcionario->is_valid()) {
            $funcionario->save();
            $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
        } else {
            $this->redirectToRoute(['c' => 'funcionario', 'a' => 'create']);
        }
    }
    public function edit($id)
    {
        $funcionario = User::find([$id]);

        if ($funcionario->is_valid()) {
            $this->renderView('Funcionarios', 'edit.php', ['funcionario' => $funcionario]);
        } else {
            $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
        }
    }
    public function atualizarPass()
    {
        $loginModel = new LoginModel();
        $funcionario = User::find(array('conditions' => array('username = ?', $loginModel->findUsername())));
        if ($funcionario->is_valid()) {
            $this->renderView('Funcionarios', 'updateEmail.php', ['funcionario' => $funcionario]);
        } else {
            $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
        }
    }
    public function update($id)
    {
        $loginModel = new LoginModel();

        $funcionario = User::find([$id]);
        $_POST['password'] = empty($_POST['password']) ? $funcionario->password : password_hash($_POST['password'], PASSWORD_DEFAULT);
        $funcionario->update_attributes($_POST);
        if ($funcionario->is_valid()) {
            $funcionario->save();
            $this->redirectToRoute(['c' => 'users', 'a' => 'show', 'id' => $loginModel->findID()]);
        } else {
            $this->redirectToRoute(['c' => 'funcionario', 'a' => 'edit', 'id' => $id]);
        }
    }
    public function delete($id)
    {
        $funcionario = User::find([$id]);
        $funcionario->ativo = false;
        $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
    }
    public function search($parametros)
    {
        $resultado = User::all(array('conditions' => array('role = ? AND username LIKE ? OR id = ?', 'funcionario', '%' . $parametros['pesquisa'] . '%', $parametros['pesquisa'])));
        $this->renderView('Funcionarios', 'index.php', ['funcionarios' => $resultado, 'pesquisa' => true]);
    }
}
