<?php
//
// LoginController.php é responsavel por redirecionar para o modelo dedicado a todas as ações a ver com a autenticação
//


require_once("Controllers/MainController.php");
require_once("Models/LoginModel.php");

class LoginController extends MainController{
    public function login(){
        $loginModel = new LoginModel();
        if($loginModel->isLoggedin()){
            $currRole = $loginModel->findRole();
            $this->redirectToRoute("dashboard", $currRole);
        } 
        if(isset($_POST['username']) && isset($_POST['password'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            if($loginModel->checkLogin($username, $password)){
                $this->redirectToRoute("dashboard", $_SESSION['role']);
            }
        }
        $this->renderView("Views/Login/index.html");
    }
    public function logout(){
        $loginModel = new LoginModel();
        $loginModel->logout();
        $this->redirectToRoute('home', 'index');
    }
    public function redirectIfLoggedIn(){
        $loginModel = new LoginModel();
        if($loginModel->isLoggedin()){
            $currRole = $loginModel->findRole();
            $this->redirectToRoute("dashboard", $currRole);
        } 

    }
    public function loginFilter($role, $role2 = null){
        $loginModel = new LoginModel();
        if(!$loginModel->hasAccess($role) && !$loginModel->hasAccess($role2)){    
            $this->redirectToRoute('auth', 'login');
        }   
    } 
}