<?php
class AccountController extends AbstractController
{
    private UserManager $userManager;
    private OrderManager $orderManager;
    private AdresseManager $adresseManager;

    public function __construct(){
        $this->userManager = new UserManager();
        $this->orderManager = new OrderManager();
        $this->adresseManager = new AdresseManager();
    }
   
    public function displayAccountAndOrders()
    {
        $user = $this->userManager->getUserById($_SESSION["user"]);
        $orders = $this->orderManager->getOrdersByUserId($_SESSION["user"]);
        $adresse = $this->adresseManager->getAdresseByUserId($_SESSION["user"]);

        $this->render("views/user/account.phtml", ["user" => $user, "orders" => $orders, "adresse" => $adresse]);
    }

}
?>