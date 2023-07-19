<?php

class ProductManager extends AbstractManager
{
    // Récupère tous les produits depuis la base de données et les retourne sous forme d'un tableau d'objets Product.
    public function index() : array
    {
        $query = $this->db->prepare("SELECT * FROM products");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        $productsTab = [];
        foreach($products as $product)
        {
            $productInstance = new Product($product["name"], $product["price"], $product["description"], $product["category_id"], $product["url_media"]);
            array_push($productsTab, $productInstance);
        }
        
        return $productsTab;
    }
}
