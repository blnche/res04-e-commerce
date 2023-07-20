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
    
    public function getProductsForCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $formName = $_POST["formName"];
            
            if ($formName === "getProductCategory")
            {
                // Récupération de la gatégorie et de son nom & id
                $category = $this->categoryManager->getCategoryById($_POST["category_list"]);
                $category_name = $category->getName();
                $category_id = $category->getId();
                
                // Récupération de toutes les catégories
                $categories = $this->categoryManager->index();
                
                // Récupération de tous les produits filtrés
                $products_filtered = $this->productsManager->getProductsForCategory($category_id);
                
                $this->render('views/homepage-filtered.phtml', ['categories'=> $categories, 'products-filtered' => $products_filtered, 'category-name' => $category_name]);
            }
        }
    }
}
