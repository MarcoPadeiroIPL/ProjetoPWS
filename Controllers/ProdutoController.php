<?php
require_once('Controllers/MainController.php');

class ProdutoController extends MainController
{
    public function index(){
        $produtos = Produto::all();
        $this->renderView('Views/Funcionario/Produtos/index.php', ['produtos' => $produtos]);
    }
    public function show($referencia){
        $produtos = Produto::find([$referencia]);
        if(is_null($produtos))
        {
            echo 'Iva não existe';
        } else {
            $this->renderView('Views/Funcionario/Produtos/show.php', ['produto' => $produtos]);
        }
    }
    public function create(){
        // redireciona para vista para criar um novo
        $this->renderView('Views/Funcionario/Produtos/create.php');
    }
    public function store(){
        $produto = new Produto($_POST);
        if($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute('produto', 'index');
        } else {
            $this->renderView('Views/Funcionario/Produtos/create.php');
        }
    
    }
    public function edit($referencia){
        $produto = Produto::find([$referencia]);

        if($produto->is_valid()){
            $this->renderView('Views/Funcionario/Produtos/edit.php', ['produto' => $produto]);
        } else {
            $this->renderView('Views/Funcionario/Produtos/index.php');
        }
    }
    public function update($referencia){
        $produto = Produto::find([$referencia]);
        $produto->update_attributes($_POST);
        if($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute('produto','index');
        } else {
            $this->renderView('Views/Funcionario/Produtos/edit.php');
        }
    }
    public function delete($referencia){
        $produto = Produto::find([$referencia]);
        $produto->delete();
        $this->redirectToRoute('produto','index');
    }
}