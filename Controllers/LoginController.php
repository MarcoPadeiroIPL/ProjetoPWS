<?php
//
// LoginController.php é responsavel por redirecionar para o modelo dedicado a todas as ações a ver com a autenticação
//


require_once('Controllers/MainController.php');
require_once('Models/LoginModel.php');

class LoginController extends MainController
{
    private $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    public function login()
    {
        $this->redirectIfLoggedIn();
        if (isset($_POST['username']) && isset($_POST['password'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $validacao = $this->loginModel->checkLogin($username, $password);

            if ($validacao == 'valid') {
                $this->redirectToRoute(['c' => 'dashboard', 'a' => $_SESSION['role']]);
            } else {
                if ($validacao == 'username') {
                    $this->renderView('Login', 'index.php', ['wrong' => 'username', 'user' => $_POST['username']]);
                } else {
                    $this->renderView('Login', 'index.php', ['wrong' => 'password', 'user' => $_POST['username']]);
                }
            }
        }
        $this->renderView('Login', 'index.php', ['wrong' => '']);
    }
    public function logout()
    {
        $this->loginModel->logout();
        $this->redirectToRoute(['c' => 'home']);
    }
    public function redirectIfLoggedIn()
    {
        if ($this->loginModel->isLoggedin()) {
            $currRole = $this->loginModel->findRole();
            $this->redirectToRoute(['c' => 'dashboard', 'a' => $currRole]);
        }
    }
    public function loginFilter($roles = [])
    {
        if (!$this->loginModel->isLoggedin()) {
            $this->redirectToRoute(['c' => 'auth', 'a' => 'login']);
        }
        foreach ($roles as $role) {
            // se não tiver acesso
            if ($this->loginModel->hasAccess($role) == 1) {
                return 0;
            }
        }
        $this->redirectToRoute(['c' => 'home']);
    }
    public function userFilter($id)
    {
        if ($this->loginModel->findRole() == 'cliente') {
            // cliente só tem acesso à sua propria informacao
            if ($id != $this->loginModel->findID()) {
                $this->redirectToRoute(['c' => 'error', 'a' => 'noAccess']);
            }
        }
        if ($this->loginModel->findRole() == 'funcionario') {
            // funcionario só tem acesso à informação de todos os clientes e de si mesmo
            $userToShow = User::find([$id]);
            if ($userToShow->role != 'cliente' && $id != $this->loginModel->findID()) {
                $this->redirectToRoute(['c' => 'error', 'a' => 'noAccess']);
            }
        }
    }
}
