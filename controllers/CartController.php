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
        if(isset($_GET["action"]))
        {
            switch($_GET["action"])
            {
                case "add" : //on va recevoir des data qu'on va stocker dans un session[cart] instancié comme array vide en debut de session dans la methode login

                    if(!empty($_POST["quantity"]))
                    {
                        //dans un manager avoir une boucle for($i=0; $i<10; $i++) ou 10 = un parametre correspondant à quantity récupérée dans le form product_order
                        //on créee autant d'instance du produuit trouvé grace a son id que du nombre de quantity
                    
                        //appeler fonction du manager qui renvoi un array en lui passant en commentaire product id et quantity du form
                        $cart_items = $this->productsManager->getProductsForOrder($_POST["product-id"], $_POST["quantity"]);
                        $_SESSION["cart"] = $cart_items;
                        //trouver comment renvoyer l'infos sur la page, surement render OU plutot dans SESSION
                        var_dump($_SESSION["cart"]);
                        
                    }
            }
        }
        //autre function pour afficher le panier, avec le total la quantité des produits et leur prix individuels
    }
}
?>