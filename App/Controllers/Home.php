<?php

namespace App\Controllers;

use \Core\Controller;
use \Core\View;
use \App\Models\PostModel;

class Home extends Controller
{
    public function indexAction()
    {
        View::renderTemplate("/pages/home.twig", [
          "posts"     => PostModel::getAll(),
          "loggedin"  => isset($_SESSION['username']),
          "blogName"  => \App\Config::BLOG_NAME
        ]);
    }
}
