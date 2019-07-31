<?php
namespace App\controllers;
use DI\Container;

use App\ViewManager;

class DashboardController extends ControllerAuth{

    public function index(){
        $this -> viewManager -> renderTemplate("dashboard.twig.html", ["user" => $this->user->email]);
    }
}