<?php
namespace App\controllers;
use DI\Container;

use App\ViewManager;
use App\db\entities\Post;

class PostsController extends Controller{

    public function index(){
        $posts = $this->doctrineManager->em->getRepository(Post::class)->findAll();

        $this -> viewManager -> renderTemplate("posts.twig.html", ["posts"=>$posts]);
    }
}