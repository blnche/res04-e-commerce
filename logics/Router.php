<?php 

function checkRoute(string $route){
    
    $uc = new UserController;
    $cc = new CategoryController;
    
    if ($route === 'register') {
        
        $uc->register();
    
    } else if ($route === 'login') {
        $uc->login();
    }
    else if ($route === "homepage"){
        $cc->displayAllCategory();
    }
}

?>