<?php

require_once 'Controllers/MainController.php';
require_once 'Models/LoginModel.php';

class UserController extends MainController{
    public function show($id){
        $user = User::find([$id]);
        
        $this->renderView('Users', 'show.php', ['utilizador' => $user]);
    }
}