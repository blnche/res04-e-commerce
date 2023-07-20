<?php

class CartController extends AbstractController{
    private CategoryManager $categoryManager;
    private ProductManager $productsManager;
    
    public function __construct()
    {
        // Initialisation des instances des gestionnaires de catégories et de produits
        $this->categoryManager = new CategoryManager();
        $this->productsManager = new ProductManager();
    }
    
    public function addToCart()
    {
        var_dump($_POST["formName"]);
        $formName = $_POST["formName"];
        
        if($formName === "addItem")
        {
            $cart_items = $this->productsManager->getProductsForOrder($_POST["product-id"], $_POST["quantity"]);

            $_SESSION["cart"][] = $cart_items;
            
            header("Location:index.php?route=homepage");
        }
    }
    //autre function pour afficher le panier, avec le total la quantité des produits et leur prix individuels

    public function index()
    {
        //session cart et user session
        
        
       $this->render("views/cart.phtml", []);
    }
}
?>