<?php

namespace App\Controllers;

use \Core\Controller;
use \Core\View;
use \App\Models\PostModel;
use App\Config;

class Home extends Controller
{
    public function indexAction()
    {
       $posts = PostModel::getAll();

       if((new \Mobile_Detect)->isMobile() && !\App\Config::IMAGES_ON_MOBILE)
       {
         foreach($posts as $i => $post)
         {
           $posts[$i]['content'] = preg_replace("/<img[^>]+\>/i", "", $post['content']);
         }
        }

        View::renderTemplate("/pages/home.twig", [
          "posts"           => $posts,
          "loggedin"        => isset($_SESSION['username']),
          "blogName"        => \App\Config::BLOG_NAME,
          "blogDescription" => \App\Config::BLOG_DESCRIPTION
        ]);
    }
}
