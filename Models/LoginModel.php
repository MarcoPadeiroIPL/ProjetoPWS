<?php
//
// LoginModel.php é responsavel pela logica de autenticação de utilizadores
//


class LoginModel
{
    public function __construct(){
        session_start();
    }

    // Validação de credenciais
    public function CheckLogin($username, $password){
        // TEMPORARIO: enquanto não existe ligação à base de dados
        $users = array(
            array('username' => 'admin', 'password' => '123', 'role' => 'admin'),
            array('username' => 'func', 'password' => '123', 'role' => 'funcionario'),
            array('username' => 'cliente', 'password' => '123', 'role' => 'cliente')
        );

        // faz a verificação das credenciais
        $res = false;
        foreach($users as $user){
            if(($user['username'] == $username) && ($user['password'] == $password)){
                $res = true;
                $role = $user['role'];
            }
        }

        if($res){
            // atribuição de valores à sessão atual
            $_SESSION['username'] = $username; // armazena uma string que representa o username
            $_SESSION['role'] = $role; // armazena a role da sessão atual numa string 
            $_SESSION['autenticado'] = (isset($_SESSION['username']) && $username == $_SESSION['username']); // armazena uma boolean
        }
        // devolve uma bool que representa o resultado do login
        return $res;
    }
    
    public function isLoggedin(){
        return isset($_SESSION['username']);
    }
    // Logout da sessão atual
    public function Logout(){
        session_destroy();
    }

    public function HasAccess($checkRole){
        if($checkRole == $_SESSION['role']){
            return true;
        }
        return false;
    }
}