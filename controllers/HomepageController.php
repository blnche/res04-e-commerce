<?php

class HomepageController extends AbstractController{
    private CategoryManager $categoryManager;
    private ProductManager $productsManager;
    
    public function __construct(){
        // Initialisation des instances des gestionnaires de catégories et de produits
        $this->categoryManager = new CategoryManager();
        $this->productsManager = new ProductManager();
    }
    
    public function displayAllCategoriesAndProducts (){
        // Récupération de toutes les catégories
        $categories = $this->categoryManager->index();

        // Récupération de tous les produits
        $products = $this->productsManager->index();

        // Affichage du template "homepage.phtml" avec les catégories et les produits
        $this->render('views/homepage.phtml', ['categories'=> $categories, 'products' => $products]);
    }

}
