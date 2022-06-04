<?php
//
// MainController.php é responsavel por conter funções basicas para alterar a rota e mudar a vista
//

class MainController{
    public function redirectToRoute($params = []){
        $url = 'Location: router.php?';
        foreach($params as $paramKey => $paramValue){
            $url .= $paramKey != 'c' ? '&' : '';
            $url .= $paramKey . '=' . $paramValue;
        }
        header($url);
        exit(0);
    }
    public function renderView($pasta, $ficheiro, $parametros = []){
        extract($parametros);
        if($pasta == 'Login' && $ficheiro == 'index.php'){
            require_once("Views/Layouts/headerLogin.php");
        } else if($pasta == 'Home' && $ficheiro == 'index.php'){
            require_once("Views/Layouts/header.php");
        } else {
            require_once('Views/Layouts/sidebar.php');
        } 

        require_once("Views/" . $pasta . "/" . $ficheiro);
        
        if(($pasta == 'Home' && $ficheiro == 'index.php' || $pasta == 'Login' && $ficheiro == 'index.html')){
            require_once("Views/Layouts/footer.php");
        } else {
            require_once('Views/Layouts/footerSidebar.php');
        } 
    }
}
