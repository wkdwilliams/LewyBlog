<?php

namespace App\Controllers;

use \Core\Controller;
use \Core\View;
use \App\Models\UserModel;

class User extends Controller
{

    public function indexAction()
    {
      View::renderTemplate("pages/login.twig");
    }

    public function authenticate()
    {
        if(!isset($_POST)){
          echo 0;
          return;
        }

        $user = UserModel::getUser($_POST['username']);

        if(empty($user)){
          echo 0;
          return;
        }

        if (!password_verify($_POST['password'], $user['password'])) {
          echo 0;
          return;
        }

        // Correct login. Authenticate the user
        $_SESSION['username'] = $_POST['username'];
        echo 1;
    }
}
