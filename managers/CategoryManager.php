<?php
    class CategoryManager extends AbstractManager {
    
        public function index() : array
        {
            $query = $this->db->prepare("SELECT * FROM categories");
            $query->execute();
            $categories = $query->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }
    }
?>