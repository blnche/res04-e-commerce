<?php

class OrderManager extends AbstractManager
{
   // Récupère toutes les commandes d'un utilisateur donné depuis la base de données et les retourne sous forme d'un tableau d'objets Order.
   public function getOrdersByUserId($id) : array
   {
        $query = $this->db->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $parameters = [
            "user_id" => $id
        ];
        $query->execute($parameters);
        $orders = $query->fetchAll(PDO::FETCH_ASSOC);
        $ordersTab = [];
        foreach($orders as $order){
            $orderInstance = new Order($order["status"], $order["date"], $order["user-id"], $order["amount"]);
            array_push($ordersTab, $orderInstance);
        }
        return $ordersTab;
   }

}
?>