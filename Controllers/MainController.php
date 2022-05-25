<?php
//
// MainController.php é responsavel por conter funções basicas para alterar a rota e mudar a vista
//

class MainController{
    public function redirectToRoute($c, $a, $id = 0){
        header("Location: router.php?c=" . $c. '&a='.$a . '&id='.$id);
        exit(0);
    }
    public function renderView($vista, $parametros = []){
        extract($parametros);
        
        require_once("Views/Layouts/header.php");
        require_once($vista);
        require_once("Views/Layouts/footer.php");
    }
}
