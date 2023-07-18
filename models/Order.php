<?php
    class Order{
    private ?int $id;
    private string $status;
    private $date;
    private int $user_id;
    
    public function __construct (string $status, DateTime $date, int $user_id){
        $this->status = $status;
        $this->date = new DateTime();
        $this->user_id = $user_id;
    }
    
    public function getId(){return $this->id;}
    public function getStatus(){ return $this->status;}
    public function getDate(){ return $this->date;}
    public function getUserId(){return $this->user_id;}

    
    public function setId($id){$this->id = $id;}
    public function setStatus($status){$this->status = $status;}
    public function setDate($date){$this->date = $date;}
    public function setUserId($user_id){$this->user_id = $user_id;}
    }
?>