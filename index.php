<?php

require 'logics/Router.php';

require 'models/Adresse.php';
require 'models/Category.php';
require 'models/User.php';
require 'models/Order.php';
require 'models/Products.php';

require 'managers/AbstractManager.php';
require 'managers/UserManager.php';

require 'controllers/AbstractController.php';
require 'controllers/UserController.php';

if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}else{
    checkRoute("login");
}



