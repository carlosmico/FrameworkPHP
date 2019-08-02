<?php
namespace App\controllers;

use App\services\PostService;
use App\ViewManager;

class HomeController extends Controller
{
    /**
     * @Inject
     * @var PostService
     */
    private $postService;
    

    public function index()
    {
        $posts = $this->postService->getPosts();

        $this->viewManager->renderTemplate("index.twig.html", ["posts" => $posts, "user" => $this->user->email]);
    }
}
