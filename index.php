<?php

require 'logics/Router.php';

require 'models/Adresse.php';
require 'models/Category.php';
require 'models/User.php';
require 'models/Order.php';
require 'models/Product.php';

session_start(); //Ouvre une session

require 'managers/AbstractManager.php';
require 'managers/UserManager.php';
require 'managers/CategoryManager.php';
require 'managers/OrderManager.php';
require 'managers/AdresseManager.php';
require 'managers/ProductManager.php';

require 'controllers/AbstractController.php';
require 'controllers/AccountController.php';
require 'controllers/UserController.php';
require 'controllers/CartController.php';
require 'controllers/HomepageController.php';

if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}else{
    checkRoute("homepage");
}