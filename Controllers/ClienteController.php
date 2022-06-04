<?php
require_once('Controllers/MainController.php');

class ClienteController extends MainController
{
    public function show($id){
        $cliente = User::find([$id]);
        $this->renderView('Clientes', 'show.php', ['cliente' => $cliente]);
    }
    public function index(){
        $clientes = User::all(array('conditions' => array('role = ?','cliente')));
        $this->renderView('Clientes', 'index.php', ['clientes' => $clientes]);
    }
    public function create(){
        // redireciona para vista para criar um novo
        $this->renderView('Clientes', 'create.php');
    }
    public function store(){
        $cliente = new User($_POST);
        // encriptar a password
        $cliente->password = password_hash($cliente->password, PASSWORD_DEFAULT);
        if($cliente->is_valid()){
            $cliente->save();
            $this->redirectToRoute(['c'=>'cliente', 'a'=>'index']);
        } else {
            $this->renderView('Clientes', 'create.php');
        }
    }
    public function edit($id){
        $cliente = User::find([$id]);

        if($cliente->is_valid()){
            $this->renderView('Clientes', 'edit.php', ['cliente' => $cliente]);
        } else {
            $this->renderView('Clientes', 'index.php');
        }
    }
    public function update($id){
        $cliente = User::find([$id]);
        $_POST['password'] = empty($_POST['password']) ? $cliente->password : password_hash($_POST['password'], PASSWORD_DEFAULT);
        $cliente->update_attributes($_POST);
        // encriptar a password
        if($cliente->is_valid()){
            $cliente->save();
            $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
        } else {
            $this->renderView('Clientes', 'edit.php');
        }
    }
    public function delete($id){
        $cliente = User::find([$id]);
        foreach($cliente->faturas as $fatura){
            foreach($fatura->linhas as $linha){
                $linha->delete();
            }
            $fatura->delete();                
        }
        $cliente->delete();
        $this->redirectToRoute(['c' => 'cliente', 'a' => 'index']);
    }
}