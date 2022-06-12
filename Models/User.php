<?php

class User extends ActiveRecord\Model
{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'users';

    // especificar os campos obrigatorios para a validação de um novo user
    static $validates_presence_of = array(
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

    static $validates_uniqueness_of = array(
        array('username', 'message' => 'Username já existe'),
        array('email', 'message' => 'Email já existe'),
        array('telefone', 'message' => 'Telefone já existe'),
        array('nif', 'message' => 'NIF já existe')
    );
    static $validates_size_of = array(
        array('telefone', 'is' => 9, 'message' => 'Precisa de ter 9 digitos!'),
        array('nif', 'is' => 9, 'message' => 'Precisa de ter 9 digitos!'),
        array('codpostal', 'is' => 8, 'message' => 'Precisa de ter 8 digitos!')
    );

    static $validates_numericality_of = array(
        array('telefone', 'only_integer' => true, 'message' => 'Tem que ser numerico!'),
        array('nif', 'only_integer' => true, 'message' => 'Tem que ser numerico!')
    );

    // relações com outras tabelas
    static $belongs_to = array(
        array('empresa')
    );
    static $has_many = array(
        array('faturas', 'foreign_key' => 'cliente_id')
    );
}
