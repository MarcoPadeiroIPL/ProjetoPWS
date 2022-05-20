<?php
class Fatura extends ActiveRecord\Model{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'faturas';
    
    // especificar os campos obrigatorios para a validação de um novo iva
    static $validates_presence_of = array (
        array('data'),
        array('valortotal'),
        array('ivaTotal'),
        array('estado'),
        array('cliente_id', 'conditions' => array('role = ?' => 'cliente'), 'message' => 'It has to be a cliente'),
        array('funcionario_id', 'conditions' => array('role = ? OR role = ?' => 'funcionario', 'admin'), 'message' => 'It has to be a funcionario')
    );
   
    // relações com outras tabelas
    static $has_many = array(
        array('linhas_faturas', 'class_name' => 'LinhaFatura'),
        array('users')
    );
}