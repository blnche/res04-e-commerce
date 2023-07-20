<?php

class UserController extends AbstractController
{
    private UserManager $manager;
    private CategoryManager $categoryManager;
    private ProductManager $productsManager;

    public function __construct()
    {
        // Initialisation des instances des gestionnaires d'utilisateurs, de catégories et de produits
        $this->manager = new UserManager();
        $this->categoryManager = new CategoryManager();
        $this->productsManager = new ProductManager();
    }

    public function login()
    {
        if(isset($_POST["email"], $_POST["password"])
        && !empty($_POST["email"]) && !empty($_POST["password"]))
        {
            // Vérification des informations de connexion
            $user = $this->manager->getUserByEmail($_POST["email"]);

            // Stockage de l'ID de l'utilisateur dans la variable de session "user"
            $_SESSION["user_id"] = $user->getId();
            
            // Récupération des catégories et des produits
            $categories = $this->categoryManager->index();
            $products = $this->productsManager->index();

            // Affichage du template "homepage.phtml" avec les catégories et les produits
            $this->render('views/homepage.phtml', ['categories'=> $categories, 'products' => $products]);
        }
        else
        {  
            // Affichage du formulaire de connexion
            $this->render("views/user/login.phtml", []);
        }
    }

    public function register()
    {
        if(isset($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"], $_POST["confirmPassword"])
        && !empty($_POST["firstName"]) && !empty($_POST["lastName"])&& !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"])
        && $_POST["password"] === $_POST["confirmPassword"])
        {
            // Création d'un nouvel utilisateur
            $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);

            // Insertion de l'utilisateur dans la base de données
            $this->manager->insertUser($user);

            // Affichage du formulaire de connexion
            $this->render("views/user/login.phtml", []);
        }else{
            // Affichage du formulaire d'inscription
            $this->render("views/user/register.phtml", []);
        }
    }
}
?>
