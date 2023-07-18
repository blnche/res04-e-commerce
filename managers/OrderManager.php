<?php

class OrderManager extends AbstractManager
{
   
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