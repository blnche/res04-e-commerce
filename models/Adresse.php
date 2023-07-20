<?php

class Adresse
{
    private ?int $id;
    private int $user_id;
    private string $street;
    private string $zip;
    private string $city;
    private string $country;

    public function __construct(int $user_id, string $street, string $zip, string $city, string $country)
    {
        $this->user_id = $user_id;
        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
        $this->id = null;
    }

    public function getId() : int{return $this->id;}

    public function setId(int $id){$this->id = $id;}

    public function getUserId() : int{return $this->user_id;}

    public function setUserId(int $user_id){$this->user_id = $user_id;}

    public function getStreet() : string{return $this->street;}

    public function setStreet(string $street){$this->street = $street;}

    public function getZip() : string{return $this->zip;}

    public function setZip(string $zip){$this->zip = $zip;}

    public function getCity() : string{return $this->city;}

    public function setCity(int $city){$this->city = $city;}

    public function getCountry() : string{return $this->country;}

    public function setCountry(int $country){$this->country = $country;}
}
?>