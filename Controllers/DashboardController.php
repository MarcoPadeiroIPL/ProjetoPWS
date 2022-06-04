<?php

require_once 'Controllers/MainController.php';

class DashboardController extends MainController{
    public function loggedInView($role){
        // caso esteja logado
        $this->renderView('Home', 'dashboard.php', ['role' => $role]);
    }

}