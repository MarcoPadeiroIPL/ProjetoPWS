<?php

require_once 'Controllers/MainController.php';
require_once 'Controllers/LoginController.php';

class DashboardController extends MainController{
    public function LoggedInView($role){
        $loginController = new LoginController();
        $loginController->LoginFilter($role);
        
        // caso esteja logado
        $this->renderView("Views/Dashboard/$role.html", $role);
    }

}