<?php
class Fatura extends ActiveRecord\Model
{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'faturas';

    // especificar os campos obrigatorios para a validação de um novo iva
    static $validates_presence_of = array(
        array('estado')
    );

    // relações com outras tabelas
    static $has_many = array(
        array('produtos'),
        array('linhas', 'class_name' => 'LinhaFatura')
    );
    static $belongs_to = array(
        array('empresa'),
        array('cliente', 'class_name' => 'User', 'foreign_key' => 'cliente_id'),
        array('funcionario', 'class_name' => 'User', 'foreign_key' => 'funcionario_id')
    );

    public function emitirFatura($id)
    {
        // vai buscar a fatura
        $fatura = Fatura::find([$id]);

        // valores para mais tarde alterar os atributos da fatura
        $valorTotalFatura = 0;
        $valorIVAFatura = 0;

        // vai por cada linha
        foreach ($fatura->linhas as $linha) {
            // adiciona ao valor total da fatura
            $valorTotalFatura += (float)$linha->valor * (int)$linha->quantidade;
            $valorIVAFatura += (((float)$linha->valor_iva * 0.01) * (float)$linha->valor) * (int)$linha->quantidade;
        }
        // atualização dos atributos que faltavam da fatura
        $novosAtributosFatura = array(
            'data' => date("Y-m-d"),
            'estado' => 'emitida',
            'valorTotal' => $valorTotalFatura,
            'ivaTotal' => $valorIVAFatura
        );
        $fatura->update_attributes($novosAtributosFatura);

        return $fatura;
    }

    public function adicionarLinha($linha, $fatura)
    {
        $exists = 0;
        // verificar se há stock
        if ($linha->produto->stock >= $linha->quantidade && $linha->quantidade > 0) {

            // verifica se a linha já existe, caso exista guarda o id da linha
            foreach ($fatura->linhas as $linhaTest) {
                if ($linha->produto->referencia == $linhaTest->produto->referencia) {
                    $exists = $linhaTest->id;
                    break;
                }
            }

            // caso exista, atualiza a linha antiga com as novas informações
            if ($exists != 0) {
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
            return true;
        } else {
            return false;
        }
    }
}
