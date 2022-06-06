<?php
//
// LoginModel.php é responsavel pela logica de autenticação de utilizadores
//


class LoginModel
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Validação de credenciais
    public function checkLogin($username, $password)
    {
        // Vai buscar todos os utilizadores ativos
        $users = User::all(array('conditions' => array('ativo = ?', true)));

        // faz a verificação das credenciais
        $res = false;
        foreach ($users as $user) {
            if (($user->username == $username) && password_verify($password, $user->password)) {
                $res = true;
                $role = $user->role;
                $id = $user->id;
            }
        }

        if ($res) {
            // atribuição de valores à sessão atual
            $_SESSION['username'] = $username; // armazena uma string que representa o username
            $_SESSION['role'] = $role; // armazena a role da sessão atual numa string 
            $_SESSION['id'] = $id; // armazena a role da sessão atual numa string 
            $_SESSION['autenticado'] = (isset($_SESSION['username']) && $username == $_SESSION['username']); // armazena uma boolean
        }
        // devolve uma bool que representa o resultado do login
        return $res;
    }

    public function isLoggedin()
    {
        return isset($_SESSION['username']);
    }
    // Logout da sessão atual
    public function logout()
    {
        session_destroy();
    }

    public function hasAccess($checkRole)
    {
        return $checkRole == $_SESSION['role'];
    }
    public function findRole()
    {
        if (isset($_SESSION['role'])) {
            return $_SESSION['role'];
        } else {
            return 'null';
        }
    }
    public function findUsername()
    {
        return $_SESSION['username'];
    }
    public function findID()
    {
        return $_SESSION['id'];
    }
}
