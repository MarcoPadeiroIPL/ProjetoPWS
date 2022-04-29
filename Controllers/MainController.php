<?php
//
// MainController.php é responsavel por conter funções basicas para alterar a rota e mudar a vista
//


class MainController{
    public function redirectToRoute($r){
        header("Location: router.php?r=" . $r);
    }
    public function renderView($vista, $role = null){
        
        require_once("Views/Layouts/head.php");
        require_once($vista);
        require_once("Views/Layouts/footer.php");
    }
}
