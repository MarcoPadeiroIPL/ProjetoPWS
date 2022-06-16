<?php
require_once('Controllers/MainController.php');

class ClienteController extends MainController
{
    public function show($id)
    {
        $cliente = User::find([$id]);
        $this->renderView('Clientes', 'show.php', ['cliente' => $cliente]);
    }
    public function index()
    {
        $clientes = User::all(array('conditions' => array('role = ?', 'cliente'), 'order' => 'ativo desc'));
        $this->renderView('Clientes', 'index.php', ['clientes' => $clientes]);
    }
    public function create()
    {
        // redireciona para vista para criar um novo
        $this->renderView('Clientes', 'create.php');
    }
    public function store()
    {
        $cliente = new User($_POST);
        // encriptar a password
        $cliente->password = password_hash($cliente->password, PASSWORD_DEFAULT);
        if ($cliente->is_valid()) {
            $cliente->save();
            $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
        } else {
            $error = array(
                'username' => $cliente->errors->on('username'),
                'email' => $cliente->errors->on('email'),
                'nif' => $cliente->errors->on('nif'),
                'telefone' => $cliente->errors->on('telefone'),
                'codpostal' => $cliente->errors->on('codpostal')
            );
            $this->renderView('Clientes', 'create.php', ['error' => $error, 'cliente' => $cliente]);
        }
    }
    public function edit($id)
    {
        $cliente = User::find([$id]);

        if ($cliente->is_valid()) {
            $this->renderView('Clientes', 'edit.php', ['cliente' => $cliente]);
        } else {
            $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
        }
    }
    public function update($id)
    {
        $cliente = User::find([$id]);
        $_POST['password'] = empty($_POST['password']) ? $cliente->password : password_hash($_POST['password'], PASSWORD_DEFAULT);
        $cliente->update_attributes($_POST);
        // encriptar a password
        if ($cliente->is_valid()) {
            $cliente->save();
            $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
        } else {
            $error = array(
                'username' => $cliente->errors->on('username'),
                'email' => $cliente->errors->on('email'),
                'nif' => $cliente->errors->on('nif'),
                'telefone' => $cliente->errors->on('telefone'),
                'codpostal' => $cliente->errors->on('codpostal')
            );
            $this->renderView('Clientes', 'edit.php', ['error' => $error, 'cliente' => $cliente]);
        }
    }
    public function delete($id)
    {
        $cliente = User::find([$id]);
        if ($cliente->ativo) {
            $cliente->update_attributes(['ativo' => false]);
            $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
        } else {
            $faturas = Fatura::all(array('conditions' => array('cliente_id = ?', $id)));
            if (!(sizeof($faturas) == 0)) {
                $clientes = User::all(array('conditions' => array('role = ?', 'cliente'), 'order' => 'ativo desc'));
                $this->renderView('Clientes', 'index.php', ['clientes' => $clientes, 'errors' => $id]);
            } else {
                $cliente->delete();
                $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
            }
        }
    }
    public function activate($id)
    {
        $cliente = User::find([$id]);
        $cliente->ativo = true;
        $cliente->save();
        $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
    }
    public function search($parametros)
    {
        $resultado = User::all(array('conditions' => array('role = ? AND username LIKE ? OR id = ? AND ativo = ?', 'cliente', '%' . $parametros['pesquisa'] . '%', $parametros['pesquisa'], true)));

        if ($parametros['place'] == 'index') {
            $this->renderView('Clientes', 'index.php', ['clientes' => $resultado, 'pesquisa' => $parametros['pesquisa']]);
        } else {
            $this->renderView('Faturas', 'escolherCliente.php', ['clientes' => $resultado, 'pesquisa' => $parametros['pesquisa']]);
        }
    }
}
