<?php
require_once 'Controllers/MainController.php';
require_once 'Models/LoginModel.php';

class FaturaController extends MainController {
    public function index(){
        $loginModel = new LoginModel();
        if($loginModel->findRole() == 'funcionario' || $loginModel->findRole() == 'admin'){
            $faturas = Fatura::all();
        } else if($loginModel->findRole() == 'cliente'){
            $cliente = User::find(array('conditions' => array('username = ?', $loginModel->findUsername()))); 
            $faturas = Fatura::all(array('conditions' => array('cliente_id = ?', $cliente->id)));
        }
        $this->renderView('Faturas', 'index.php', ['faturas' => $faturas, 'pesquisa' => false]);
    }
    public function escolherCliente(){
        $clientes = User::all(array('conditions' => array('role = ?', 'cliente')));
        $this->renderView('Faturas', 'escolherCliente.php', ['clientes' => $clientes]);
    }
    public function create(){
        $loginModel = new LoginModel();

        // obtem o cliente escolhido
        $id = $_POST['clienteID'];

        // obtem o funcionario que está atualmente a tratar da fatura
        $funcionario = User::find(array('conditions' => array('username = ?', $loginModel->findUsername())));

        // cria uma nova fatura
        $novaFatura = array(
            //'data'=> date('Y-m-d H:i:s'),
            'estado' => 'em lancamento',
            'cliente_id' => $id,
            'funcionario_id' => $funcionario->id
        );

        $fatura = new Fatura($novaFatura);
        if($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute(['c' => 'fatura', 'a' => 'register', 'id' => $fatura->id]);
        }
    }
    public function register($fatura_id){
        $fatura = Fatura::find([$fatura_id]);
        $produtos = Produto::all();
        $this->renderView('Faturas', 'registar.php', ['produtos' => $produtos, 'fatura' => $fatura]);
    }
    public function adicionarLinha(){
        $linha = new LinhaFatura($_POST);
        $fatura = Fatura::find([$linha->fatura_id]);
        $exists = 0;
        if($linha->is_valid()){
            if($linha->produto->stock >= $linha->quantidade){
                // verifica se a linha já existe, caso exista guarda o id da linha
                foreach($fatura->linhas as $linhaTest){
                    if($linha->produto->referencia == $linhaTest->produto->referencia){
                        $exists = $linhaTest->id;
                        break;
                    }
                }

                // caso exista, atualiza a linha antiga com as novas informações
                if($exists != 0){
                    $oldLinha = LinhaFatura::find([$exists]);
                    $oldLinha->quantidade += $linha->quantidade;
                    $oldLinha->produto->stock -= $linha->quantidade;
                    $oldLinha->save();
                    $oldLinha->produto->save();
                } else { // senão cria uma nova linha
                    $linha->produto->stock -= $linha->quantidade;
                    $linha->save();
                    $linha->produto->save();
                    $fatura->save();
                }
                $faturax = Fatura::find([$linha->fatura_id]);
                $produtos = Produto::all(array('conditions' => array('stock > 0')));
                $this->renderView('Faturas', 'registar.php', ['produtos'=>$produtos, 'fatura' => $faturax]);
            } else {
                echo 'Não há stock';
            // erro
            }
        }

    }
    public function emitir($faturaID){
        // vai buscar a fatura
        $fatura = Fatura::find([$faturaID]);

        // valores para mais tarde alterar os atributos da fatura
        $valorTotalFatura = 0;
        $valorIVAFatura = 0;

        // vai por cada linha
        foreach($fatura->linhas as $linha){
            // adiciona ao valor total da fatura
            $valorTotalFatura += (float)$linha->valor * (int)$linha->quantidade;
            $valorIVAFatura += (float)$linha->valor_iva * (int)$linha->quantidade;
        }
        // atualização dos atributos que faltavam da fatura
        $novosAtributosFatura = array(
            'estado' => 'emitida',
            'valorTotal' => $valorTotalFatura,
            'ivaTotal' => $valorIVAFatura
        );
        $fatura->update_attributes($novosAtributosFatura);
        if($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute(['c' => 'fatura', 'a' => 'show', 'id' => $faturaID]);
        }
    }
    public function show($fatura_id){
        $fatura = Fatura::find([$fatura_id]);
        $empresa = Empresa::find([1]);
        // vai buscar as linhas que pertencem a esta fatura
        
        $this->renderView('Faturas', 'show.php', ['fatura' => $fatura, 'empresa' => $empresa]);
    }
    public function delete($fatura_id){
        $fatura = Fatura::find([$fatura_id]);
        $fatura->delete();
        $this->redirectToRoute(['c' => 'fatura', 'a' => 'index']);
    }
    public function search($parametros){
        $user = User::find(array('conditions' => array('username LIKE ?', '%'.$parametros['pesquisa'].'%')));
        if(isset($user)){
            $resultado = Fatura::all(array('conditions' => array('cliente_id = ? OR funcionario_id = ? OR id = ?', $user->id, $user->id, $parametros['pesquisa'])));
        } else {
            $resultado = Fatura::all(array('conditions' => array('id = ?', $parametros['pesquisa'])));
        }
       
        $this->renderView('Faturas', 'index.php', ['faturas' => $resultado, 'pesquisa' => true]);
    }
   
}