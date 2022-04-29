<?php
//
// HomeController.php é responsavel por todas as ações que tenham a ver com a Home - Pagina inicial
//



require_once 'Controllers/MainController.php';
require_once 'Controllers/LoginController.php';

class HomeController extends MainController {
    public function Index(){
        
        $this->renderView("Views/Home/index.php");
    }
}