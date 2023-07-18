<?php

class Category{
    private ?int $id;
    private string $name;
    
    public function __construct (string $name){
    }
    
    public function getId(){return $this->id;}
    public function getName(){ return $this->name;}

    
    public function setId($id){$this->id = $id;}
    public function setName($name){$this->name = $name;}

    
}