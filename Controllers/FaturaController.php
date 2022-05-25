<?php
require_once 'Controllers/MainController.php';
require_once 'Models/LoginModel.php';

class FaturaController extends MainController {
    public function index(){
        $clientes = User::all(array('conditions' => array('role = ?', 'cliente')));
        $this->renderView('Views/Funcionario/Faturas/index.php', ['clientes' => $clientes]);
    }
    public function escolherCliente(){
        $loginModel = new LoginModel();

        // obtem o cliente escolhido
        $id = $_POST['clienteID'];
        $cliente = User::find([$id]);

        // obtem o funcionario que está atualmente a tratar da fatura
        $funcionario = User::find(array('conditions' => array('username = ?', $loginModel->findUsername())));

        // obtem todos os produtos para mostrar na vista
        $produtos = Produto::all();

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
            $this->renderView('Views/Funcionario/Faturas/registar.php', ['cliente' => $cliente, 'funcionario' => $funcionario, 'produtos' => $produtos, 'fatura' => $fatura]);
        }
    }
    public function emitir(){
        // vai buscar a fatura
        $faturaID = $_POST['fatura_id'];
        $fatura = Fatura::find([$faturaID]);

        // valores para mais tarde alterar os atributos da fatura
        $valorTotalFatura = 0;
        $valorIVAFatura = 0;

        // vai por cada linha
        foreach($_POST['linha'] as $linha){
            // adiciona ao valor total da fatura
            $valorTotalFatura += (float)$linha['valor'] * (int)$linha['quantidade'];
            $valorIVAFatura += (float)$linha['valor_iva'] * (int)$linha['quantidade'];

            // vai buscar os atributos passados por post para criar uma nova linha
            $atributos = array(
                'quantidade' => $linha['quantidade'],
                'valor' => $linha['valor'],
                'valor_iva' => $linha['valor_iva'],
                'fatura_id' => $faturaID,
                'produto_id' => $linha['produto_id']
            );

            // criação de uma nova linha
            $temp = new LinhaFatura($atributos);
            if($temp->is_valid()){
                $temp->save();
            }
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
            $this->redirectToRoute('fatura', 'show', $faturaID);
        }
    }
    public function show($fatura_id){
        $fatura = Fatura::find([$fatura_id]);
        // vai buscar as linhas que pertencem a esta fatura
        $linhas = LinhaFatura::all(array('conditions' => array('fatura_id = ?', $fatura_id)));
        
        $this->renderView('Views/Funcionario/Faturas/show.php', ['fatura' => $fatura, 'linhas' => $linhas]);

    }
}