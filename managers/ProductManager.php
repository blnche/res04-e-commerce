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
            $productInstance->setId($product["id"]);
            array_push($productsTab, $productInstance);
        }
        
        return $productsTab;
    }
    
    public function getProductsForCategory(int $id) : array
    {
        $query = $this->db->prepare("
            SELECT *
            FROM products
            WHERE category_id = :category_id
        ");
        $parameters = 
        [
            "category_id" => $id
        ];
        $query->execute($parameters);
        
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($products as $product)
        {
            $new_product = new Product(
                $product["name"],
                $product["price"],
                $product["description"],
                $product["category_id"],
                $product["url_media"]
            );
            
            $new_product->setId($product["id"]);
            
            $products_list[] = $new_product;
        }
        
        return $products_list;
    }
    
     public function getProductsForOrder(int $id, int $quantity) : array
    {
        $query = $this->db->prepare("
            SELECT *
            FROM products
            WHERE id = :id
        ");
        $parameters = 
        [
            "id" => $id
        ];
        $query->execute($parameters);
        
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        
        /*for($i=0; $i<$quantity; $i++)
        {
            $new_product = new Product(
                $products[$i]["name"],
                $products[$i]["price"],
                $products[$i]["description"],
                $products[$i]["category_id"],
                $products[$i]["url_media"]
            );
            
            $new_product->setId($products[$i]["id"]);*/
        
        foreach($products as $product)
        {
            $new_product = new Product(
                $product["name"],
                $product["price"],
                $product["description"],
                $product["category_id"],
                $product["url_media"]
            );
            
            $new_product->setId($product["id"]);
            $products_list[] = $new_product;
        }
        
        return $products_list;
    //get product by id for quantity avec en parametre id et quantity qui renvoit un array
    }
}
