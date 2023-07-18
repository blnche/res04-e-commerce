<?php

class HomepageController extends AbstractController{
    private CategoryManager $categoryManager;
    private ProductManager $productsManager;
    
    public function __construct(){
        $this->categoryManager = new CategoryManager();
        $this->productsManager = new ProductManager();
    }
    
    public function displayAllCategoriesAndProducts (){
        $categories = $this->categoryManager->index();
        $products = $this->productsManager->index();
        $this->render('views/homepage.phtml', ['categories'=> $categories, 'products' => $products]);
    }

    // public function displayAllProductsByCategory()
}



























