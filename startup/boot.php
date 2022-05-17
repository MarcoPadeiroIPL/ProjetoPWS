<?php
// boot.php é responsavel por todas as constantes e tarefas que devem ser executadas no inicio do programa
require_once 'vendor/autoload.php';

// Criação de ligação à base de dados
ActiveRecord\Config::initialize(function($cfg)
{
    $USER = 'root';
    $PASS = '';
    $SERVER = 'localhost';
    $DATABASE = 'ProjetoPWS_A';


    $cfg->set_model_directory('./Models');
    $cfg->set_connections(
    array(
        'development' => 'mysql://' . $USER . ':' . $PASS . '@' . $SERVER . '/' . $DATABASE,
    )
    );
});