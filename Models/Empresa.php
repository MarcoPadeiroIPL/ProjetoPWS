<?php
class Empresa extends ActiveRecord\Model{
    // para ter 100% certeze que vai buscar a tabela correta
    static $table_name = 'empresas';

    // especificar os campos obrigatorios para a validação de uma nova linha de fatura
    static $validates_presence_of = array (
        array('designsocial'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codpostal'),
        array('localidade'),
        array('capitalsocial')
    );

    // relações com outras tabelas
    static $has_many = array(
        array('faturas'),
        array('users')
    );
}