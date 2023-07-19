<?php

class AdresseManager extends AbstractManager
{
   
    public function getAdresseByUserId($id) : array
    {
        $query = $this->db->prepare("SELECT * FROM adresses WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $adresses = $query->fetchAll(PDO::FETCH_ASSOC);
        $adressesTab = [];
        foreach($adresses as $adresse){
            $adresseInstance = new Adresse($adresse["user_id"], $adresse["street"], $adresse["zip"], $adresse["city"], $adresse["country"]);
            array_push($adressesTab, $adresseInstance);
        }
        return $adressesTab;
    }
}
?>