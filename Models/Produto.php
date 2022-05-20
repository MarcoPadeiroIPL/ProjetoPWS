<?php
class Produto extends ActiveRecord\Model{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'produtos';

    // serve para dizer ao programa que a chave primaria é 'referencia' e não 'id'
    static $primary_key = 'referencia';

    // especificar os campos obrigatorios para a validação de um novo produto
    static $validates_presence_of = array (
        array('descricao'),
        array('preco'),
        array('stock'),
        array('iva_id'),
    );
    static $belongs_to = array(
        array('iva'),
        array('linha_fatura', 'class_name' => 'LinhaFatura')
    );

}
