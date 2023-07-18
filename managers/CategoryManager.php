<?php
    class CategoryManager extends AbstractManager {
    
        public function index() : array
        {
            $query = $this->db->prepare("SELECT * FROM categories");
            $query->execute();
            $categories = $query->fetchAll(PDO::FETCH_ASSOC);
            $categoriesTab = [];
            foreach($categories as $category){
                $categoryInstance = new Category($category["name"]);
                array_push($categoriesTab, $categoryInstance);
            }
            return $categoriesTab;
        }
    }
?>