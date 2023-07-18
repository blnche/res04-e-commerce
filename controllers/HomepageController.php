<?php

class HomepageController extends AbstractController{
    private CategoryManager $categoryManager;
    private ProductsManager $productsManager;
    
    public function __construct(){
        $this->categoryManager = new CategoryManager();
        $this->productsManager = new ProductsManager();
    }
    
    public function displayAllCategoriesAndProducts (){
        $categories = $this->categoryManager->index();
        $products = $this->productsManager->index();
        $this->render('views/homepage.phtml', ['categories'=> $categories, 'products' => $products]);
    }

    // public function displayAllProductsByCategory()
}



























