<?php
require_once('Controllers/MainController.php');

class EmpresaController extends MainController
{
    public function show($id)
    {
        $empresa = Empresa::find([$id]);
        $this->renderView('Empresa', 'show.php', ['empresa' => $empresa]);
    }
    public function edit($id)
    {
        $empresa = Empresa::find([$id]);

        $this->renderView('Empresa', 'edit.php', ['empresa' => $empresa]);
    }
    public function update($id)
    {
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes(array(
            'designsocial' => $_POST['designsocial'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'nif' => $_POST['nif'],
            'morada' => $_POST['morada'],
            'codpostal' => $_POST['codpostal'],
            'localidade' => $_POST['localidade']
        ));
        if ($empresa->is_valid()) {
            $empresa->save();
            $this->redirectToRoute(['c' => 'empresa', 'a' => 'show', 'id' => $id]);
        } else {
            $error = array(
                'designsocial' => $empresa->errors->on('designsocial'),
                'email' => $empresa->errors->on('email'),
                'nif' => $empresa->errors->on('nif'),
                'telefone' => $empresa->errors->on('telefone'),
                'codpostal' => $empresa->errors->on('codpostal')
            );
            $this->renderView('Empresa', 'edit.php', ['error' => $error, 'empresa' => $empresa]);
        }
    }
}
