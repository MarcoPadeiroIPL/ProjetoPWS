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

        if ($empresa->is_valid()) {
            $this->renderView('Empresa', 'edit.php', ['empresa' => $empresa]);
        } else {
            $this->redirectToRoute(['c' => 'empresa', 'a' => 'show', 'id' => $id]);
        }
    }
    public function update($id)
    {
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);
        // encriptar a password
        if ($empresa->is_valid()) {
            $empresa->save();
            $this->redirectToRoute(['c' => 'empresa', 'a' => 'show', 'id' => $id]);
        } else {
            $this->redirectToRoute(['c' => 'empresa', 'a' => 'edit', 'id' => $id]);
        }
    }
}
