<?php
//
// LoginController.php é responsavel por redirecionar para o modelo dedicado a todas as ações a ver com a autenticação
//


require_once("Controllers/MainController.php");
require_once("Models/LoginModel.php");

class LoginController extends MainController{
    private $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    public function login(){
        $this->redirectIfLoggedIn();
        if(isset($_POST['username']) && isset($_POST['password'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            if($this->loginModel->checkLogin($username, $password)){
                $this->redirectToRoute(['c' => "dashboard", 'a' => $_SESSION['role']]);
            }
        }
        $this->renderView("Views/Login/index.html");
    }
    public function logout(){
        $this->loginModel->logout();
        $this->redirectToRoute('home', 'index');
    }
    public function redirectIfLoggedIn(){
        if($this->loginModel->isLoggedin()){
            $currRole = $this->loginModel->findRole();
            $this->redirectToRoute(['c' => "dashboard", 'a' => $currRole]);
        } 

    }
    public function loginFilter($roles = []){
        if(!$this->loginModel->isLoggedin()){
            $this->redirectToRoute(['c' => 'auth', 'a' => 'login']);
        }
        foreach($roles as $role){
            // se não tiver acesso
            if($this->loginModel->hasAccess($role) == 1){ return 0; }
        }
        $this->redirectToRoute(['c' => 'error', 'a' => 'noAccess']);
    } 
}