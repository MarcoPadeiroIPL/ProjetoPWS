<?php
class Produto extends ActiveRecord\Model
{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'produtos';

    // serve para dizer ao programa que a chave primaria é 'referencia' e não 'id'
    static $primary_key = 'referencia';

    // especificar os campos obrigatorios para a validação de um novo produto
    static $validates_presence_of = array(
        array('descricao'),
        array('preco'),
        array('stock'),
        array('iva_id')
    );
    static $belongs_to = array(
        array('iva', 'foreign_key' => 'iva_id')
    );
    static $validates_numericality_of = array(
        array('stock', 'only_integer' => true),
        array('stock', 'greater_than_or_equal_to' => 0, 'message' => 'Tem que ser superior ou igual a 0'),
        array('preco', 'greater_than_or_equal_to' => 0, 'message' => 'Tem que ser superior ou igual a 0')
    );
    // has_many & has_one tem que ter um belongs_to do outro lado da chave estrangeira
}
