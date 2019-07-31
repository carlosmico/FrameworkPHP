<?php
namespace App\controllers;

use App\db\entities\User;

class UsersController extends Controller{
    public function index(){
        $users = $this->doctrineManager->em->getRepository(User::class)->findAll();

        $this -> viewManager -> renderTemplate("users.twig.html", ["users"=>$users, "saludo"=>"hola"]);
    }
}