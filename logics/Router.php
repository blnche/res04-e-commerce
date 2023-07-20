<?php

// Fonction pour vérifier la route et exécuter les actions appropriées en fonction de la route donnée.
function checkRoute(string $route)
{


	// Instancie les contrôleurs nécessaires.
	$uc = new UserController(); // Contrôleur pour la gestion des utilisateurs.
	$cc = new HomepageController(); // Contrôleur pour la page d'accueil.
	$ac = new AccountController();

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
        $cc->displayAllCategoriesAndProducts();
    }
    else if ($route === "homepage-filtered")
    {
        $cc->getProductsForCategory();
    }
    else if($route === "disconnect")
    {
        // Si la route est "disconnect", détruit la session utilisateur pour effectuer une déconnexion et redirige vers la page de connexion.
        unset($_SESSION["user"]);
        session_destroy();
        $uc->login();
    }
    elseif ($route === 'account') 
    {
		  $ac->displayAccountAndOrders();
	  } 
    elseif ($route === 'account-address-add') 
    {
		  $ac->addUserAdresse();
	  } 
    elseif ($route === 'account-address-edit') 
    {
		  $ac->editUserAdresse();
	  } 
    elseif ($route === 'account-edit') 
    {
		  $ac->edit();
	  }
}
