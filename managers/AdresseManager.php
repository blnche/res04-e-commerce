<?php

class AdresseManager extends AbstractManager
{
   // Récupère toutes les adresses d'un utilisateur donné depuis la base de données et les retourne sous forme d'un tableau d'objets Adresse.
    public function getAdressesByUserId($id) : array
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

    public function addAdresse(Adresse $adresse) : void {
        $query = $this->db->prepare('
            INSERT INTO adresses (user_id, street, zip, city, country)
            VALUES (:user_id, :street, :zip, :city, :country)
        ');
        $parameters = [
            'user_id' => $adresse->getUserId(),
            'street' => $adresse->getStreet(),
            'zip' => $adresse->getZip(),
            'city' => $adresse->getCity(),
            'country' => $adresse->getCountry()
        ];
        $query->execute($parameters);
    }
}
?>