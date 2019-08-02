<?php
namespace App\controllers;
use DI\Container;

use App\db\entities\Post;
use App\ViewManager;
use App\services\PostService;

class DashboardController extends ControllerAuth{

    /**
     * @Inject
     * @var PostService
     */
    private $postService;

    public function index(){
        $this -> viewManager -> renderTemplate("dashboard.twig.html", ["user" => $this->user->email, "posts" => $this->postService->getPostsByUser($this -> user -> id)]);
    }
}