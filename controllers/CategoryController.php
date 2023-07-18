<?php

class CategoryController extends AbstractController{
    private CategoryManager $manager;
    
    public function __construct(){
        $this->manager = new CategoryManager();
    }
    
    public function displayAllCategory (){
        $categories = $this->manager->index();
        $this->render('views/homepage.phtml', ['categories'=> $categories]);
    }
}



























