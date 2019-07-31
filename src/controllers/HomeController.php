<?php
namespace App\controllers;
use DI\Container;

use App\ViewManager;

class HomeController extends Controller{

    public function index(){
        // $this -> viewManager = $this->container->get(ViewManager::class);

        $this -> viewManager -> renderTemplate("index.twig.html");
    }
}