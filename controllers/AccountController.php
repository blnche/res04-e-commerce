<?php
class AccountController extends AbstractController
{
	private UserManager $userManager;
	private OrderManager $orderManager;
	private AdresseManager $adresseManager;

	public function __construct()
	{
		// Initialisation des instances des gestionnaires de données
		$this->userManager = new UserManager();
		$this->orderManager = new OrderManager();
		$this->adresseManager = new AdresseManager();
	}

	public function displayAccountAndOrders()
	{
		// Récupération de l'utilisateur actuel en utilisant l'ID stocké dans la variable de session "user"
		$user = $this->userManager->getUserById($_SESSION["user"]);

		// Récupération des commandes de l'utilisateur actuel en utilisant son ID
		$orders = $this->orderManager->getOrdersByUserId($_SESSION["user"]);

		// Récupération de l'adresse de l'utilisateur actuel en utilisant son ID
		$adresses = $this->adresseManager->getAdressesByUserId($_SESSION["user"]);

		// Affichage du template "account.phtml" avec les données de l'utilisateur, les commandes et l'adresse
		$this->render("views/user/account.phtml", ["user" => $user, "orders" => $orders, "adresses" => $adresses]);
	}
	public function addUserAdresse()
	{
		if (isset($_POST)) {
			$user_id = $_SESSION['user'];
			$street = $_POST['street'];
			$zip = $_POST['zip'];
			$city = $_POST['city'];
			$country = $_POST['country'];

			$adresse = new Adresse(
				$user_id,
				$street,
				$zip,
				$city,
				$country
			);
			$this->adresseManager->addAdresse($adresse);
			header("Location: /index.php?route=account");
			exit();
		}
	}
	public function edit()
	{
		if (isset($_POST)) {
			$id = $_SESSION['user'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];

			// ici commence un bloc du bordel qui sert à déterminer si l'utilisateur tente de modifier
			// son mot de passe, auquel cas, on procède aux vérifications nécessaires, 
			// sinon le mode passe nest pas modifié
			$ancient_pwd = $this->userManager->getUserById($id)->getPassword();

			if(isset($_POST['password']) || isset($_POST['new-password'])) {
				$pwd = $_POST['password'];
				$new_pwd = $_POST['new-password'];
				$new_pwd_confirm = $_POST['new-password-confirm'];
				if(password_verify($pwd,$ancient_pwd)) {
					echo "nope"; // gestion d'erreurs à implémenter
					unset($_POST);
					return;
				}
				if($new_pwd !== $new_pwd_confirm) {
					echo "nope"; // gestion d'erreurs à implémenter
					unset($_POST);
					return;
				}
				$new_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
			}
			// fin du bloc

			$new_pwd = $new_pwd ?? $ancient_pwd; 
			// ^ si un nouveau mot de pase n'a pas été assigné dans le bloc précédent, 
			// on assigne l'ancien pour ne pas modifier le mot de passe dans la BDD 
			
			$user = new User(
				$first_name,
				$last_name,
				$email,
				$new_pwd
			);
			$user->setId($id);
			$this->userManager->editUser($user);
			header("Location: /index.php?route=account");
			exit();
		}
	}
	public function editUserAdresse()
	{
		if (isset($_POST)) {
			$id = $_POST['id'];
			$street = $_POST['street'];
			$zip = $_POST['zip'];
			$city = $_POST['city'];
			$country = $_POST['country'];
			$values = [
				'id' => $id,
				'street' => $street,
				'zip' => $zip,
				'city' => $city,
				'country' => $country
			];
			$this->adresseManager->editAdresse($values);
			header("Location: /index.php?route=account");
			exit();
		}
	}
}
