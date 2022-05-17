<?php
//
// HomeController.php é responsavel por todas as ações que tenham a ver com a Home - Pagina inicial
//



require_once 'Controllers/MainController.php';
require_once 'Controllers/LoginController.php';
require_once 'Models/LoginModel.php';

class HomeController extends MainController {
    public function index(){
        $loginController = new LoginController();
        $loginController->redirectIfLoggedIn();

        $this->renderView("Views/Home/index.php");
    }
}