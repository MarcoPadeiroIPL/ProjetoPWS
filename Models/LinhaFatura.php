<?php
class LinhaFatura extends ActiveRecord\Model{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'linhas_faturas';

    // especificar os campos obrigatorios para a validação de uma nova linha de fatura
    static $validates_presence_of = array (
        array('quantidade'),
        array('valor'),
        array('valor_iva'),
        array('fatura_id'),
        array('produto_id')
    );
    
    // relações com outras tabelas
    static $has_one = array(
        array('produto')
    );
    static $belongs_to = array(
        array('fatura'),
    );
}