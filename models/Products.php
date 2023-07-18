<?php

class Products{
    private ?int $id;
    private string $name;
    private string $price;
    private string $description;
    private int $category_id;
    
    public function __construct (string $name, string $price, string $description, int $category_id){
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category_id = $category_id;
    }
    
    public function getId() : ?int {return $this->id;}
    public function getName() : string { return $this->name;}
    public function getPrice() : string {return $this->price;}
    public function getDescription() : string {return $this->description;}
    public function getCategory_id(): string {return $this->category_id;}
    
    public function setId($id){$this->id = $id;}
    public function setName($name){$this->name = $name;}
    public function setPrice($price){$this->price = $price;}
    public function setDescription($description){$this->description = $description;}
    public function setCategory_id($category_id){$this->category_id = $category_id;}
    
}