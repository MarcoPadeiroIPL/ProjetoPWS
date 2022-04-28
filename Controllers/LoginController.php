<?php
//
// LoginController.php é responsavel por redirecionar para o modelo dedicado a todas as ações a ver com a autenticação
//


require_once("Controllers/MainController.php");
require_once("Models/LoginModel.php");

class LoginController extends MainController{
    public function Login(){

        $loginModel = new LoginModel();

        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($loginModel->CheckLogin($username, $password)){
                $this->redirectToRoute("home/index");
            }
        }
        $this->renderView("Views/Login/index.html");
    }
    public function Logout(){
        $loginModel = new LoginModel();
        $loginModel->Logout();
        $this->redirectToRoute('auth/login');
    }
    
}