<?php 

function checkRoute(string $route){
    
    $uc = new UserController;
    $cc = new HomepageController;
    
    if ($route === 'register') 
    {
        $uc->register();
    } 
    else if ($route === 'login') 
    {
        $uc->login();
    }
    else if ($route === "homepage")
    {
        $cc->displayAllCategoriesAndProducts();
    }else if($route === "disconnect")
    {
        unset($_SESSION["user"]);
        session_destroy();
        $uc->login();
    }
}

?>