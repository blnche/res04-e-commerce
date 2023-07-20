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
			$pwd = $_POST['password'];
			$confirm_pwd = $_POST['confirm-password'];

			if ($pwd !== $confirm_pwd) {
				echo "nope"; // action de guard
				unset($_POST);
				return;
			}

			$pwd = password_hash($pwd, PASSWORD_DEFAULT);
			$user = new User(
				$first_name,
				$last_name,
				$email,
				$pwd
			);
			$user->setId($id);
			$this->userManager->editUser($user);
			header("Location: /index.php?route=account");
			exit();
		}
	}
}
