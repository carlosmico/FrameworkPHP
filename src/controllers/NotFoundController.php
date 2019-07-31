<?php
namespace App\controllers;

use App\db\entities\User;

class NotFoundController extends Controller{
    public function index(){
        $this -> viewManager -> renderTemplate("NotFound.twig.html");
    }
}