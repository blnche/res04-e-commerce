<?php
class UserManager extends AbstractManager {

    // Récupère tous les utilisateurs depuis la base de données et les retourne sous forme d'un tableau d'associations.
    public function getAllUsers() : array
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // Récupère un utilisateur par son ID depuis la base de données et le retourne en tant qu'objet User.
    public function getUserById(int $id) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE users.id = :id");
        $parameters = ["id" => $id];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        // Crée une instance de l'objet User avec les informations récupérées de la base de données.
        $userInstance = new User($user['first_name'], $user['last_name'], $user['email'], $user['password']);
        $userInstance->setId($user["id"]);
        return $userInstance;
    }

    // Récupère un utilisateur par son adresse email depuis la base de données et le retourne en tant qu'objet User.
    public function getUserByEmail(string $email) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE users.email = :email");
        $parameters = ['email' => $email];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Crée une instance de l'objet User avec les informations récupérées de la base de données.
        $userInstance = new User($user['first_name'], $user['last_name'], $user['email'], $user['password']);
        $userInstance->setId($user["id"]);
        return $userInstance;
    }

    // Insère un nouvel utilisateur dans la base de données.
    public function insertUser(User $user)
    {
        $query = $this->db->prepare("INSERT INTO users (first_name, last_name, email, password)
                               VALUES (:first_name, :last_name, :email, :password)");
        $parameters = [
            "first_name" => $user->getFirstName(),
            "last_name" => $user->getLastName(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword()
        ];
        $query->execute($parameters);
    }

    // Met à jour les informations d'un utilisateur dans la base de données.
    public function editUser(User $user) : void
    {
        $query = $this->db->prepare("UPDATE users SET users.username = :username, users.email = :email, users.password = :password WHERE users.id = :id");
        $parameters = [
            // 'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'id' => $user->getId()
        ];
        $query->execute($parameters);
    }
}
