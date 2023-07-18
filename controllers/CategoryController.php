<?php

class CategoryController extends AbstractController{
    private CategoryManager $manager;
    
    public function __construct(){
        $this->manager = new CategoryManager();
    }
    
    public function displayAllCategory (){
        $categories = $categoryManager->getAllCategories();
        $this->render('views/homepage.phtml', ['categories'=> $categories]);
    }
}



























