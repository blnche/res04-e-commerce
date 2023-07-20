<?php

class AdresseManager extends AbstractManager
{
   // Récupère toutes les adresses d'un utilisateur donné depuis la base de données et les retourne sous forme d'un tableau d'objets Adresse.
    public function getAdressesByUserId($user_id) : array
    {
        $query = $this->db->prepare("SELECT * FROM adresses WHERE user_id = :user_id");
        $parameters = [
            "user_id" => $user_id
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
    public function getAdresseById(int $id) : Adresse {
        $query = $this->db->prepare('
            SELECT * FROM adresses
            WHERE id = :id
        ');
        $parameters = ['id' => $id];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $adresse = new Adresse(
            $result['user_id'],
            $result['street'],
            $result['zip'],
            $result['city'],
            $result['country']
        );
        $adresse->setId($id);
        return $adresse;
    }
    public function editAdresse(array $values) : void {
        $prevData = $this->getAdresseById($values['id']);
        $street = $values['street'] ?? $prevData->getStreet();
        $zip = $values['zip'] ?? $prevData->getZip();
        $city = $values['city'] ?? $prevData->getCity();
        $country = $values['country'] ?? $prevData->getCountry();
        
        $query = $this->db->prepare('
            UPDATE adresses
            SET street = :street,
                zip = :zip,
                city = :city,
                country = :country
            WHERE id = :id
        ');
        $parameters = [
            'street' => $street,
            'zip' => $zip,
            'city' => $city,
            'country' => $country
        ];
        $query->execute($parameters);
    }
}
?>