<?php
require_once 'Controllers/MainController.php';
require_once 'Models/LoginModel.php';

class ErrorController extends MainController {
    public function noAccess(){
        $loginModel = new LoginModel();
        $this->renderView('Errors', 'index.php', ['currUser' => $loginModel->findRole()]);
    }
}