<?php
class AccountController extends AbstractController
{
    private UserManager $userManager;
    private OrderManager $orderManager;

    public function __construct(){
        $this->userManager = new UserManager();
        $this->orderManager = new OrderManager();
    }
   
    public function displayAccountAndOrders()
    {
        $user = $this->userManager->getUserById($_SESSION["user"]);
        $orders = $this->orderManager->getOrdersByUserId($_SESSION["user"]);

        $this->render("views/user/account.phtml", ["user" => $user, "orders" => $orders]);
    }

}
?>