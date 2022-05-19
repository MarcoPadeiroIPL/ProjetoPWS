<?php
require_once('Controllers/MainController.php');

class IvaController extends MainController
{
    public function index(){

        $ivas = Ivas::all();
        $this->renderView('Views/Funcionario/IVA/index.php', ['ivas' => $ivas]);
    }
    public function show($id){

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
        $this->renderView('Views/Funcionario/IVA/create.php');
    }
    public function store(){
        $iva = new Ivas($_POST);
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('iva', 'index');
        } else {
            $this->renderView('Views/Funcionario/IVA/create.php');
        }
    
    }
    public function edit($id){
        $iva = Ivas::find([$id]);

        if($iva->is_valid()){
            $this->renderView('Views/Funcionario/IVA/edit.php', ['iva' => $iva]);
        } else {
            $this->renderView('Views/Funcionario/IVA/index.php');
        }
    }
    public function update($id){
        $iva = Ivas::find([$id]);
        $iva->update_attributes($_POST);
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('iva','index');
        } else {
            $this->renderView('Views/Funcionario/IVA/edit.php');
        }
    }
    public function delete($id){
        $iva = Ivas::find([$id]);
        $iva->delete();
        $this->redirectToRoute('iva','index');
    }
}