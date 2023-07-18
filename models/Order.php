<?php
    class Order{
    private ?int $id;
    private string $status;
    private Date $date;
    private int $user_id;
    
    public function __construct (string $status, Date $date, int $user_id){
    }
    
    public function getId(){return $this->id;}
    public function getStatus(){ return $this->status;}
    public function getDate(){ return $this->Date;}
    public function getUserId(){return $this->user_id;}

    
    public function setId($id){$this->id = $id;}
    public function setStatus($Status){$this->status = $status;}
    public function setDate($date){$this->Date = $date;}
    public function setUserId($user_Id){$this->user_id = $user_id;}
    }
?>