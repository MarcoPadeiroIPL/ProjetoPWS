<?php

require_once 'Controllers/MainController.php';
require_once 'Controllers/LoginController.php';

class DashboardController extends MainController{
    public function loggedInView($role){
        $loginController = new LoginController();
        $loginController->loginFilter($role);
        
        // caso esteja logado
        switch($role) { 
            case 'cliente': $currRole='Cliente'; break;
            case 'admin': $currRole='Admin'; break;
            case 'funcionario': $currRole='Funcionario'; break;
        }
        $this->renderView("Views/$currRole/dashboard.html", ['role' => $role]);
    }

}