<?php

abstract class AbstractManager
{
   protected PDO $db;

   public function __construct()
   {
      $dbName = "blanchepeltier_ecommerce";
      $host = "db.3wa.io";
      $port = "3306";
      $username = "blanchepeltier";
      $password = "6df6213ed1bccc46589270829cdb7338";
      $connexionString = "mysql:host=$host;port=$port;charset=utf8;dbname=$dbName";
      
      $this->db = new PDO(
          $connexionString,
          $username,
          $password
      );
   }

}
?>