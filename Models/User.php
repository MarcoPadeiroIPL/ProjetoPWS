<?php
class User extends ActiveRecord\Model{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'users';

    // especificar os campos obrigatorios para a validação de um novo user
    static $validates_presence_of = array (
        array('username'),
        array('password'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codpostal'),
        array('localidade'),
        array('role')
    );

    // relações com outras tabelas
    static $belongs_to = array(
        array('empresa'),
    );
    static $has_many = array(
        array('faturas', 'foreign_key' => 'cliente_id')
    );
}