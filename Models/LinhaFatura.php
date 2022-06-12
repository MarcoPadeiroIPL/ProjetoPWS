<?php
class LinhaFatura extends ActiveRecord\Model
{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'linhas_faturas';

    // especificar os campos obrigatorios para a validação de uma nova linha de fatura
    static $validates_presence_of = array(
        array('quantidade'),
        array('valor'),
        array('valor_iva'),
        array('fatura_id'),
        array('produto_id')
    );

    static $validates_numericality_of = array(
        array('quantidade', 'only_integer' => true, 'message' => 'Tem que ser numerico'),
        array('valor_iva', 'only_integer' => true, 'message' => 'Tem que ser numerico')
    );

    // relações com outras tabelas
    static $belongs_to = array(
        array('fatura'),
        array('produto', 'foreign_key' => 'produto_id')
    );
}
