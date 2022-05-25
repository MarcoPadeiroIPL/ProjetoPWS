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
        array('produtos')
    );
    static $belongs_to = array(
        array('empresa'),
        array('user')
    );
}