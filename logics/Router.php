<?php 

function checkRoute(string $route){
    
    $uc = new UserController;
    
    if ($route === 'register') {
        
        $uc->register();
    
    } else if ($route === 'login') {
        $uc->login();
    }
}

?>