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
        
        //method pour get category object
        public function getCategoryById (int $id) : Category
        {
            $query = $this->db->prepare("
                SELECT *
                FROM categories
                WHERE id = :id
            ");
            $parameters = 
            [
                "id" => $id    
            ];
            $query->execute($parameters);
            
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            $category = new Category (
                    $result["name"]
            );
            
            $category->setId($result["id"]);
            
            return $category;
        }
    }
?>