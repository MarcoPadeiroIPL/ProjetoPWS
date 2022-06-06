<?php
require_once('Controllers/MainController.php');

class IvaController extends MainController
{
    public function index()
    {

        $ivas = Iva::all();
        $this->renderView('IVA', 'index.php', ['ivas' => $ivas, 'pesquisa' => false]);
    }
    public function show($id)
    {

        $ivas = Iva::find([$id]);
        if (is_null($ivas)) {
            echo 'Iva não existe';
        } else {
            $this->renderView('IVA', 'show.php', ['iva' => $ivas]);
        }
    }
    public function create()
    {
        // redireciona para vista para criar um novo
        $this->renderView('IVA', 'create.php');
    }
    public function store()
    {
        $iva = new Iva($_POST);
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
        } else {
            $this->redirectToRoute(['c' => 'iva', 'a' => 'create']);
        }
    }
    public function edit($id)
    {
        $iva = Iva::find([$id]);

        if ($iva->is_valid()) {
            $this->renderView('IVA', 'edit.php', ['iva' => $iva]);
        } else {
            $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
        }
    }
    public function update($id)
    {
        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
        } else {
            $this->redirectToRoute(['c' => 'iva', 'a' => 'edit', 'id' => $id]);
        }
    }
    public function delete($id)
    {
        $iva = Iva::find([$id]);
        $iva->delete();
        $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
    }
    public function search($parametros)
    {
        $resultado = Iva::all(array('conditions' => array('descricao LIKE ? OR id = ?', '%' . $parametros['pesquisa'] . '%', $parametros['pesquisa'])));
        $this->renderView('IVA', 'index.php', ['ivas' => $resultado, 'pesquisa' => true]);
    }
}
