<?php

class CartController extends AbstractController{
    private CategoryManager $categoryManager;
    private ProductManager $productsManager;
    
    public function __construct()
    {
        // Initialisation des instances des gestionnaires de catégories et de produits
        $this->categoryManager = new CategoryManager();
        $this->productsManager = new ProductManager();
    }
    
    public function addToCart()
    {
        if(isset($_GET["action"]))
        {
            switch($_GET["action"])
            {
                case "add" : //on va recevoir des data qu'on va stocker dans un session[cart] instancié comme array vide en debut de session dans la methode login
            }
        }
    }
}
?>