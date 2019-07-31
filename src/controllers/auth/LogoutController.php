<?php
namespace App\controllers\auth;
use DI\Container;

use App\controllers\ControllerAuth;

class LogoutController extends ControllerAuth{
    public function index(){
        $this -> sessionManager -> delete("user");
        $this -> redirectTo("login");
    }
}