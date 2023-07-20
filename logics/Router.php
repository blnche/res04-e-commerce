<?php

// Fonction pour vérifier la route et exécuter les actions appropriées en fonction de la route donnée.
function checkRoute(string $route)
{


	// Instancie les contrôleurs nécessaires.
	$uc = new UserController(); // Contrôleur pour la gestion des utilisateurs.
	$hc = new HomepageController(); // Contrôleur pour la page d'accueil.
	$ac = new AccountController();
	$cc = new CartController();

    // Vérifie la valeur de la route pour déterminer quelle action doit être exécutée.
    if ($route === 'register') 
    {
        // Si la route est "register", appelle la méthode 'register()' du contrôleur UserController.
        $uc->register();
    } 
    else if ($route === 'login') 
    {
        // Si la route est "login", appelle la méthode 'login()' du contrôleur UserController.
        $uc->login();
    }
    else if ($route === "homepage")
    {
        // Si la route est "homepage", appelle la méthode 'displayAllCategoriesAndProducts()' du contrôleur HomepageController.
        $hc->displayAllCategoriesAndProducts();
    }
    else if ($route === "homepage-filtered")
    {
        $hc->getProductsForCategory();
    }
    else if($route === "disconnect")
    {
        // Si la route est "disconnect", détruit la session utilisateur pour effectuer une déconnexion et redirige vers la page de connexion.
        unset($_SESSION["user"]);
        session_destroy();
        $uc->login();
    }
    else if ($route === 'account') 
    {
		  $ac->displayAccountAndOrders();
	  } 
    else if ($route === 'account-address-add') 
    {
		  $ac->addUserAdresse();
	  } 
    else if ($route === 'account-address-edit') 
    {
		  $ac->editUserAdresse();
	  } 
    else if ($route === 'account-edit') 
    {
		  $ac->edit();
	  }
    else if ($route === 'add-item')
    {
        $cc->addToCart();
    }
    else if ($route === 'cart')
    {
        $cc->index();
    }
}
