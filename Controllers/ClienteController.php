<?php
require_once('Controllers/MainController.php');

class ClienteController extends MainController
{
    public function show($id){

        $cliente = Users::find([$id]);
        $faturasDoCliente = array('conditions' => array('cliente_id = ?', $id));
        $faturas = Faturas::all($faturasDoCliente);
        $this->renderView('Views/Funcionario/RegistoClientes/show.php', ['cliente' => $cliente, 'faturas' => $faturas]);
    }
    public function index(){

        $onlyClientes = array('conditions' => array('role = ?', 'cliente'));
        $clientes = Users::all($onlyClientes); 
        $this->renderView('Views/Funcionario/RegistoClientes/index.php', ['clientes' => $clientes]);
    }
    public function create(){
        // redireciona para vista para criar um novo
        $this->renderView('Views/Funcionario/RegistoClientes/create.php');
    }
    public function store(){
        $cliente = new Users($_POST);
        if($cliente->is_valid()){
            $cliente->save();
            $this->redirectToRoute('cliente', 'index');
        } else {
            $this->renderView('Views/Funcionario/RegistoClientes/create.php');
        }
    }
    public function edit($id){
        $cliente = Users::find([$id]);

        if($cliente->is_valid()){
            $this->renderView('Views/Funcionario/RegistoClientes/edit.php', ['cliente' => $cliente]);
        } else {
            $this->renderView('Views/Funcionario/RegistoClientes/index.php');
        }
    }
    public function update($id){

        $cliente = Users::find([$id]);
        $cliente->update_attributes($_POST);
        if($cliente->is_valid()){
            $cliente->save();
            $this->redirectToRoute('cliente','index');
        } else {
            $this->renderView('Views/Funcionario/RegistoClientes/edit.php');
        }
    }
    public function delete($id){
        $cliente = Users::find([$id]);
        $cliente->delete();
        $this->redirectToRoute('cliente','index');
    }
}