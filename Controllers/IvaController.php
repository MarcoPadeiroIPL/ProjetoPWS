<?php
require_once('Controllers/MainController.php');

class IvaController extends MainController
{
    public function index(){

        $ivas = Iva::all();
        $this->renderView('Views/Funcionario/IVA/index.php', ['ivas' => $ivas]);
    }
    public function show($id){

        $ivas = Iva::find([$id]);
        if(is_null($ivas))
        {
            echo 'Iva não existe';
        } else {
            $this->renderView('Views/Funcionario/IVA/show.php', ['iva' => $ivas]);
        }
    }
    public function create(){
        // redireciona para vista para criar um novo
        $this->renderView('Views/Funcionario/IVA/create.php');
    }
    public function store(){
        $iva = new Iva($_POST);
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
        } else {
            $this->renderView('Views/Funcionario/IVA/create.php');
        }
    
    }
    public function edit($id){
        $iva = Iva::find([$id]);

        if($iva->is_valid()){
            $this->renderView('Views/Funcionario/IVA/edit.php', ['iva' => $iva]);
        } else {
            $this->renderView('Views/Funcionario/IVA/index.php');
        }
    }
    public function update($id){
        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
        } else {
            $this->renderView('Views/Funcionario/IVA/edit.php');
        }
    }
    public function delete($id){
        $iva = Iva::find([$id]);
        $iva->delete();
        $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
    }
}