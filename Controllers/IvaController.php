<?php
require_once('Controllers/MainController.php');

class IvaController extends MainController
{
    public function index()
    {

        $ivas = Iva::all();
        $this->renderView('IVA', 'index.php', ['ivas' => $ivas]);
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
        // encriptar a password
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
        } else {
            $error = array(
                'percentagem' => $iva->errors->on('percentagem')
            );
            $this->renderView('IVA', 'create.php', ['error' => $error, 'iva' => $iva]);
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
            $error = array(
                'percentagem' => $iva->errors->on('percentagem')
            );
            $this->renderView('IVA', 'edit.php', ['error' => $error, 'iva' => $iva]);
        }
    }
    public function delete($id)
    {
        $iva = Iva::find([$id]);
        $produtos = Produto::find(array('conditions' => array('iva_id = ?', $id)));
        if (sizeof($produtos) == 0) {
            $iva->delete();
            $this->redirectToRoute(['c' => 'iva', 'a' => 'index']);
        } else {
            $this->renderView('IVA', 'index.php', ['ivas' => Iva::all(), 'errors' => $id]);
        }
    }
    public function search($parametros)
    {
        $resultado = Iva::all(array('conditions' => array('descricao LIKE ? OR id = ?', '%' . $parametros['pesquisa'] . '%', $parametros['pesquisa'])));
        $this->renderView('IVA', 'index.php', ['ivas' => $resultado, 'pesquisa' => $parametros['pesquisa']]);
    }
}
