<?php
namespace App\controllers;

use App\db\entities\User;

class MethodNotAllowedController extends Controller{
    public function index(){
        $this -> viewManager -> renderTemplate("MethodNotAllowed.twig.html");
    }
}