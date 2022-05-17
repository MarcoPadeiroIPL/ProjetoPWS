<?php

require_once 'Controllers/MainController.php';
require_once 'Controllers/LoginController.php';

class DashboardController extends MainController{
    public function loggedInView($role){
        $loginController = new LoginController();
        $loginController->loginFilter($role);
        
        // caso esteja logado
        $this->renderView("Views/Dashboard/$role.html", ['role' => $role]);
    }

}