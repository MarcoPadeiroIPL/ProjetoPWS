<?php
require_once 'Controllers/MainController.php';
require_once 'Models/LoginModel.php';

class FaturaController extends MainController
{
    public function index()
    {
        $loginModel = new LoginModel();
        if ($loginModel->findRole() == 'funcionario' || $loginModel->findRole() == 'admin') {
            $faturas = Fatura::all();
        } else if ($loginModel->findRole() == 'cliente') {
            $cliente = User::find(array('conditions' => array('username = ?', $loginModel->findUsername())));
            $faturas = Fatura::all(array('conditions' => array('cliente_id = ?', $cliente->id)));
        }
        $this->renderView('Faturas', 'index.php', ['faturas' => $faturas, 'pesquisa' => false]);
    }
    public function escolherCliente()
    {
        $clientes = User::all(array('conditions' => array('role = ? AND ativo = ?', 'cliente', true)));
        $this->renderView('Faturas', 'escolherCliente.php', ['clientes' => $clientes, 'pesquisa' => false]);
    }
    public function create($idCliente)
    {
        $loginModel = new LoginModel();

        // obtem o funcionario que está atualmente a tratar da fatura
        $funcionario = User::find(array('conditions' => array('username = ?', $loginModel->findUsername())));

        // cria uma nova fatura
        $novaFatura = array(
            //'data' => date("Y", strtotime(date())),
            'estado' => 'em lancamento',
            'cliente_id' => $idCliente,
            'funcionario_id' => $funcionario->id
        );

        $fatura = new Fatura($novaFatura);
        if ($fatura->is_valid()) {
            $fatura->save();
            $this->redirectToRoute(['c' => 'fatura', 'a' => 'register', 'id' => $fatura->id]);
        }
    }
    public function register($fatura_id)
    {
        $fatura = Fatura::find([$fatura_id]);
        $produtos = Produto::all(array('conditions' => array('stock > 0')));
        $this->renderView('Faturas', 'registar.php', ['produtos' => $produtos, 'fatura' => $fatura, 'pesquisa' => false]);
    }
    public function searchProduto($parametros)
    {
        $fatura = Fatura::find([$parametros['fatura_id']]);
        $resultado = Produto::all(array('conditions' => array('descricao LIKE ? OR referencia = ? AND stock > 0', '%' . $parametros['pesquisa'] . '%', $parametros['pesquisa'])));
        $this->renderView('Faturas', 'registar.php', ['produtos' => $resultado, 'fatura' => $fatura, 'pesquisa' => true]);
    }
    public function adicionarLinha()
    {
        $linha = new LinhaFatura($_POST);
        $fatura = Fatura::find([$linha->fatura_id]);

        if ($linha->is_valid()) {
            if ($fatura->adicionarLinha($linha, $fatura)) {
                $this->redirectToRoute(['c' => 'fatura', 'a' => 'register', 'id' => $fatura->id]);
            }
        }
        $this->redirectToRoute(['c' => 'fatura', 'a' => 'register', 'id' => $fatura->id]);
    }
    public function emitir($faturaID)
    {
        $fatura = new Fatura();
        $fatura = $fatura->emitirFatura($faturaID);

        if ($fatura->is_valid()) {
            $fatura->save();

            // Update na capital social
            $empresa = new Empresa();
            $empresa->updateCapitalSocial(1);

            $this->redirectToRoute(['c' => 'fatura', 'a' => 'show', 'id' => $faturaID]);
        }
    }
    public function show($fatura_id)
    {
        $fatura = Fatura::find([$fatura_id]);
        $empresa = Empresa::find([1]);
        // vai buscar as linhas que pertencem a esta fatura

        $this->renderView('Faturas', 'show.php', ['fatura' => $fatura, 'empresa' => $empresa]);
    }
    public function delete($fatura_id)
    {
        $fatura = Fatura::find([$fatura_id]);
        foreach ($fatura->linhas as $linha) {
            $linha->delete();
        }
        $fatura->delete();
        $this->redirectToRoute(['c' => 'fatura', 'a' => 'index']);
    }
    public function search($parametros)
    {
        $user = User::find(array('conditions' => array('username LIKE ?', '%' . $parametros['pesquisa'] . '%')));
        if (isset($user)) {
            $resultado = Fatura::all(array('conditions' => array('cliente_id = ? OR funcionario_id = ? OR id = ?', $user->id, $user->id, $parametros['pesquisa'])));
        } else {
            $resultado = Fatura::all(array('conditions' => array('id = ?', $parametros['pesquisa'])));
        }

        $this->renderView('Faturas', 'index.php', ['faturas' => $resultado, 'pesquisa' => true]);
    }
}
