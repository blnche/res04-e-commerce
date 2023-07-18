<?php

class UserController extends AbstractController
{
    private UserManager $manager;

    public function __construct()
    {
        $this->manager = new UserManager();
    }

    public function login()
    {
        if(isset($_POST["email"], $_POST["password"])
        && !empty($_POST["email"]) && !empty($_POST["password"]))
        {
            $user = $this->manager->getUserByEmail($_POST["email"]);
            $_SESSION["user"] = $user->getId();
            $this->render('views/homepage.phtml', []);
        }
        else
        {  
            $this->render("views/user/login.phtml", []);
        }
    }

    public function register()
    {
        if(isset($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"], $_POST["confirmPassword"])
        && !empty($_POST["firstName"]) && !empty($_POST["lastName"])&& !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"])
        && $_POST["password"] === $_POST["confirmPassword"])
        {
            $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);
            $this->manager->insertUser($user);
            $this->render("views/user/login.phtml", []);
        }else{
            $this->render("views/user/register.phtml", []);
        }
    }
}
?>