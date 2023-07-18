<?php

require 'logics/Router.php';

require 'models/Adresse.php';
require 'models/Category.php';
require 'models/User.php';
require 'models/Order.php';
require 'models/Products.php';

require 'managers/AbstractManager.php';
require 'managers/UserManager.php';
require 'managers/CategoryManager.php';
require 'managers/ProductsManager.php';

require 'controllers/AbstractController.php';
require 'controllers/UserController.php';
require 'controllers/HomepageController.php';

if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}else{
    checkRoute("homepage");
}



