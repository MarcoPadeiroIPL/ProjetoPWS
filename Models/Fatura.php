<?php
class Fatura extends ActiveRecord\Model{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'faturas';
    
    // especificar os campos obrigatorios para a validação de um novo iva
    static $validates_presence_of = array (
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
}