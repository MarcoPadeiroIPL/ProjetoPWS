<?php
require_once('Controllers/MainController.php');

class ProdutoController extends MainController
{
    public function index()
    {
        $produtos = Produto::all();
        $this->renderView('Produtos', 'index.php', ['produtos' => $produtos, 'pesquisa' => false]);
    }
    public function show($referencia)
    {
        $produtos = Produto::find([$referencia]);
        if (is_null($produtos)) {
            echo 'Iva não existe';
        } else {
            $this->renderView('Produtos', 'show.php', ['produto' => $produtos]);
        }
    }
    public function create()
    {
        $ivas = Iva::all(array('conditions' => array('vigor = ?', 1)));
        // redireciona para vista para criar um novo
        $this->renderView('Produtos', 'create.php', ['ivas' => $ivas]);
    }
    public function store()
    {
        $produto = new Produto($_POST);
        if ($produto->is_valid()) {
            $produto->save();
            $this->redirectToRoute(['c' => 'produto', 'a' => 'index']);
        } else {
            $ivas = Iva::all(array('conditions' => array('vigor = ?', 1)));
            $this->renderView('Produtos', 'create.php', ['produto' => $produto, 'ivas' => $ivas]);
        }
    }
    public function edit($referencia)
    {
        $produto = Produto::find([$referencia]);

        if ($produto->is_valid()) {
            $ivas = Iva::all(array('conditions' => array('vigor = ?', 1)));
            $this->renderView('Produtos', 'edit.php', ['produto' => $produto, 'ivas' => $ivas]);
        } else {
            $this->redirectToRoute(['c' => 'produto', 'a' => 'index']);
        }
    }
    public function update($referencia)
    {
        $produto = Produto::find([$referencia]);
        $produto->update_attributes($_POST);
        if ($produto->is_valid()) {
            $produto->save();
            $this->redirectToRoute(['c' => 'produto', 'a' => 'index']);
        } else {
            $this->redirectToRoute(['c' => 'produto', 'a' => 'edit', 'id' => $referencia]);
        }
    }
    public function delete($referencia)
    {
        $produto = Produto::find([$referencia]);
        $produto->delete();
        $this->redirectToRoute(['c' => 'produto', 'a' => 'index']);
    }
    public function search($parametros)
    {
        $resultado = Produto::all(array('conditions' => array('descricao LIKE ? OR referencia = ?', '%' . $parametros['pesquisa'] . '%', $parametros['pesquisa'])));
        $this->renderView('Produtos', 'index.php', ['produtos' => $resultado, 'pesquisa' => true]);
    }
}
