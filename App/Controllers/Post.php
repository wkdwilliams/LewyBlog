<?php

namespace App\Controllers;

use \Core\Controller;
use \Core\View;
use \App\Models\PostModel;

class Post extends Controller
{
    public function indexAction()
    {
        $post = PostModel::get($this->route_params['id']);

        View::renderTemplate("/pages/post.twig", ["post" => $post, "loggedin" => isset($_SESSION['username'])]);
    }

    public function edit()
    {
        if(!isset($_SESSION['username']) || !isset($this->route_params['id'])) die(header('Location: /'));
        $post = PostModel::get($this->route_params['id']);

        View::renderTemplate("/pages/edit.twig", ["post" => $post]);
    }

    public function editPost()
    {
        if(!isset($_SESSION['username']) || !isset($_POST)) return;

        PostModel::edit($this->route_params['id'], $_POST['title'], $_POST['content']);

        $post = PostModel::get($this->route_params['id']);

        View::renderTemplate("/pages/edit.twig", ["post" => $post, "edited" => true]);
    }

    public function create()
    {
        if(!isset($_SESSION['username'])) return;

        View::renderTemplate("/pages/create.twig");
    }

    public function createPost()
    {
        if(!isset($_SESSION['username']) || !isset($_POST)) return;

        PostModel::create($_POST['title'], $_POST['content'], $_SESSION['userid']);

        header("location: /");
    }
}
