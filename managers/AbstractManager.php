<?php

abstract class AbstractManager
{
   protected PDO $db;

   public function __construct()
   {
      $dbName = "kevinqeraca_ecommerce";
      $host = "db.3wa.io";
      $port = "3306";
      $username = "kevinqeraca";
      $password = "666a53abc522d5ba40fc46882ee5e430";
      $connexionString = "mysql:host=$host;port=$port;dbname=$dbName";
      
      $this->db = new PDO(
          $connexionString,
          $username,
          $password
      );
   }

}
?>