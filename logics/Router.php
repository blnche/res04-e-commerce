<?php

// Fonction pour vérifier la route et exécuter les actions appropriées en fonction de la route donnée.
function checkRoute(string $route)
{

	// Instancie les contrôleurs nécessaires.
	$uc = new UserController(); // Contrôleur pour la gestion des utilisateurs.
	$cc = new HomepageController(); // Contrôleur pour la page d'accueil.
	$ac = new AccountController();

	// Vérifie la valeur de la route pour déterminer quelle action doit être exécutée.
	if ($route === 'register') {
		// Si la route est "register", appelle la méthode 'register()' du contrôleur UserController.
		$uc->register();
	} elseif ($route === 'login') {
		// Si la route est "login", appelle la méthode 'login()' du contrôleur UserController.
		$uc->login();
	} elseif ($route === "homepage") {
		// Si la route est "homepage", appelle la méthode 'displayAllCategoriesAndProducts()' du contrôleur HomepageController.
		$cc->displayAllCategoriesAndProducts();
	} elseif ($route === "disconnect") {
		// Si la route est "disconnect", détruit la session utilisateur pour effectuer une déconnexion et redirige vers la page de connexion.
		unset($_SESSION["user"]);
		session_destroy();
		$uc->login();
	} elseif ($route === 'account') {
		$ac->displayAccountAndOrders();
	} elseif ($route === 'account-address-add') {
		$ac->addUserAdresse();
	} elseif ($route === 'account-address-edit') {

	} elseif ($route === 'account-edit') {
		$ac->edit();
	}
}
