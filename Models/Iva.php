<?php
class Iva extends ActiveRecord\Model
{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'ivas';

    // especificar os campos obrigatorios para a validação de um novo iva
    static $validates_presence_of = array(
        array('percentagem'),
        array('descricao'),
        array('vigor'),
    );

    static $validates_numericality_of = array(
        array('percentagem', 'only_integer' => true, 'message' => 'Tem que ser numerico')
    );
    // relações com outras tabelas
    static $has_many = array(
        array('produtos')
    );
}
