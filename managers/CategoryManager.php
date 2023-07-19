<?php
    class CategoryManager extends AbstractManager {
    
        // Récupère toutes les catégories depuis la base de données et les retourne sous forme d'un tableau d'objets Category.
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