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
        $funcionarios = User::all(array('conditions' => array('role = ?', 'funcionario'), 'order' => 'ativo desc'));
        $this->renderView('Funcionarios', 'index.php', ['funcionarios' => $funcionarios]);
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
            $error = array(
                'username' => $funcionario->errors->on('username'),
                'email' => $funcionario->errors->on('email'),
                'nif' => $funcionario->errors->on('nif'),
                'telefone' => $funcionario->errors->on('telefone'),
                'codpostal' => $funcionario->errors->on('codpostal')
            );
            $this->renderView('Funcionarios', 'create.php', ['error' => $error, 'funcionario' => $funcionario]);
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
            $error = array(
                'username' => $funcionario->errors->on('username'),
                'email' => $funcionario->errors->on('email'),
                'nif' => $funcionario->errors->on('nif'),
                'telefone' => $funcionario->errors->on('telefone'),
                'codpostal' => $funcionario->errors->on('codpostal')
            );
            $this->renderView('Funcionarios', 'edit.php', ['error' => $error, 'funcionario' => $funcionario]);
        }
    }
    public function updatePass($id)
    {
        $funcionario = User::find([$id]);
        $_POST['password'] = empty($_POST['password']) ? $funcionario->password : password_hash($_POST['password'], PASSWORD_DEFAULT);
        $funcionario->update_attributes(array(
            'password' => $_POST['password'],
            'email' => $_POST['email']
        ));
        if ($funcionario->is_valid()) {
            $funcionario->save();
            $this->redirectToRoute(['c' => 'users', 'a' => 'show', 'id' => $id]);
        } else {
            $error = array(
                'email' => $funcionario->errors->on('email')
            );
            $this->renderView('Funcionarios', 'updateEmail.php', ['error' => $error, 'funcionario' => $funcionario]);
        }
    }
    public function delete($id)
    {
        $funcionario = User::find([$id]);
        if ($funcionario->ativo) {
            $funcionario->update_attributes(['ativo' => false]);
            $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
        } else {
            $faturas = Fatura::all(array('conditions' => array('funcionario_id = ?', $id)));
            if (!(sizeof($faturas) == 0)) {
                $funcionarios = User::all(array('conditions' => array('role = ?', 'funcionario'), 'order' => 'ativo desc'));
                $this->renderView('Funcionarios', 'index.php', ['funcionarios' => $funcionarios, 'errors' => $id]);
            } else {
                $funcionario->delete();
                $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
            }
        }
    }
    public function activate($id)
    {
        $funcionario = User::find([$id]);
        $funcionario->ativo = true;
        $funcionario->save();
        $this->redirectToRoute(['c' => 'funcionario', 'a' => 'index']);
    }
    public function search($parametros)
    {
        $resultado = User::all(array('conditions' => array('role = ? AND username LIKE ? OR id = ?', 'funcionario', '%' . $parametros['pesquisa'] . '%', $parametros['pesquisa'])));
        $this->renderView('Funcionarios', 'index.php', ['funcionarios' => $resultado, 'pesquisa' => $parametros['pesquisa']]);
    }
}
